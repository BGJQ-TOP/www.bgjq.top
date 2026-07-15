<?php
class NationController extends Controller {
    
    public function index() {
        seo()->setTitle(is_chinese() ? '邦国列表' : 'Nations');
        seo()->setDescription(is_chinese() 
            ? '浏览邦国崛起服务器中的所有玩家建立的邦国。了解各国历史、领土、外交关系与特色文化。'
            : 'Browse all player-established nations on BangGuo Rise server. Explore their history, territory, diplomacy, and unique culture.'
        );
        
        // 从 markers.json 在线获取邦国列表
        $list = [];
        $markersUrl = 'http://bgjq.simpfun.cn/tiles/minecraft_overworld/markers.json';
        
        try {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'ignore_errors' => true
                ]
            ]);
            
            $response = file_get_contents($markersUrl, false, $context);
            
            if ($response !== false) {
                $data = json_decode($response, true);
                
                if (is_array($data)) {
                    $countries = [];
                    
                    // 找到"疆土"类别
                    $nationTerritoryData = null;
                    foreach ($data as $item) {
                        if (isset($item['name']) && $item['name'] === '疆土' && isset($item['markers']) && is_array($item['markers'])) {
                            $nationTerritoryData = $item;
                            break;
                        }
                    }
                    
                    if ($nationTerritoryData && isset($nationTerritoryData['markers'])) {
                        $markers = $nationTerritoryData['markers'];
                        
                        // 找到"邦国王城"类别获取王城坐标
                        $capitalsData = null;
                        foreach ($data as $item) {
                            if (isset($item['name']) && $item['name'] === '邦国王城' && isset($item['markers']) && is_array($item['markers'])) {
                                $capitalsData = $item;
                                break;
                            }
                        }
                        
                        // 构建王城坐标映射
                        $capitalCoords = [];
                        if ($capitalsData && isset($capitalsData['markers'])) {
                            foreach ($capitalsData['markers'] as $capital) {
                                if (isset($capital['popup']) && isset($capital['point'])) {
                                    // 从 popup 提取邦国名称，如：「伏见稻荷狐域」的王城
                                    if (preg_match('/「([^」]+)」的王城/u', $capital['popup'], $capitalMatches)) {
                                        $capitalName = trim($capitalMatches[1]);
                                        $capitalCoords[$capitalName] = $capital['point'];
                                    }
                                }
                            }
                        }
                        
                        // 从 popup 字段中提取邦国名称和疆土大小
                        // popup 格式："疆土归属：伏见稻荷狐域<br/>护盾开启：否<br/>宣言：狐守田畴·田育灵狐"
                        foreach ($markers as $marker) {
                            if (isset($marker['popup']) && isset($marker['points'])) {
                                $popupText = $marker['popup'];
                                // 使用正则提取"疆土归属："后面的邦国名称
                                // popup 格式使用半角冒号
                                if (preg_match('/疆土归属:([^\n\r<]+)/u', $popupText, $matches)) {
                                    $countryName = trim($matches[1]);
                                    if (!empty($countryName)) {
                                        // 计算疆土大小：使用多边形面积公式计算覆盖的区块数量
                                        $territorySize = 0;
                                        if (isset($marker['points']) && is_array($marker['points'])) {
                                            // 计算所有多边形的面积
                                            $territorySize = $this->calculateTerritorySize($marker['points']);
                                        }
                                        
                                        // 去重
                                        if (!in_array($countryName, array_column($countries, 'name'))) {
                                            $countries[] = [
                                                'name' => $countryName,
                                                'name_zh' => $countryName,
                                                'name_en' => $countryName,
                                                'slug' => $this->generateSlug($countryName),
                                                'territory_size' => $territorySize,
                                                'capital_x' => isset($capitalCoords[$countryName]['x']) ? $capitalCoords[$countryName]['x'] : null,
                                                'capital_z' => isset($capitalCoords[$countryName]['z']) ? $capitalCoords[$countryName]['z'] : null,
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    $list = $countries;
                }
            }
        } catch (Exception $e) {
            error_log('Failed to fetch nations from markers.json: ' . $e->getMessage());
        }
        
        $this->view('nations/index', [
            'list' => $list,
            'page' => 1,
        ]);
    }
    
    // 生成 URL 友好的 slug
    private function generateSlug($name) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
        return $slug ?: 'nation';
    }
    
    // 递归统计坐标点数量
    private function countCoordinates($data) {
        $count = 0;
        if (is_array($data)) {
            foreach ($data as $item) {
                if (is_array($item)) {
                    // 如果包含 x 和 z 键，说明是坐标点
                    if (isset($item['x']) && isset($item['z'])) {
                        $count++;
                    } else {
                        // 否则递归统计
                        $count += $this->countCoordinates($item);
                    }
                }
            }
        }
        return $count;
    }
    
    // 计算疆土面积（区块数）
    private function calculateTerritorySize($points) {
        $totalArea = 0;
        
        // 遍历所有多边形组
        foreach ($points as $polygonGroup) {
            if (is_array($polygonGroup)) {
                // 遍历每个多边形
                foreach ($polygonGroup as $polygon) {
                    if (is_array($polygon) && count($polygon) >= 3) {
                        // 使用 Shoelace formula 计算多边形面积（单位：方块）
                        $area = $this->calculatePolygonArea($polygon);
                        $totalArea += abs($area);
                    }
                }
            }
        }
        
        // 转换为区块数（1 区块 = 16x16 = 256 方块）
        $chunks = ceil($totalArea / 256);
        return $chunks;
    }
    
    // 使用 Shoelace formula 计算多边形面积
    private function calculatePolygonArea($points) {
        $n = count($points);
        if ($n < 3) return 0;
        
        $area = 0;
        for ($i = 0; $i < $n; $i++) {
            $j = ($i + 1) % $n;
            $x1 = $points[$i]['x'] ?? 0;
            $z1 = $points[$i]['z'] ?? 0;
            $x2 = $points[$j]['x'] ?? 0;
            $z2 = $points[$j]['z'] ?? 0;
            
            $area += ($x1 * $z2 - $x2 * $z1);
        }
        
        return $area / 2;
    }
    
    public function show() {
        $slug = $this->request->get('slug');
        
        if (!$slug) {
            $this->redirect('/nations');
        }
        
        $nation = content()->getNationBySlug($slug);
        
        if (!$nation) {
            http_response_code(404);
            echo "Nation not found";
            return;
        }
        
        content()->incrementViewCount('bgjq_nations', $nation['id']);
        
        $nationName = is_chinese() ? ($nation['name_zh'] ?? $nation['name']) : ($nation['name_en'] ?? $nation['name']);
        seo()->setTitle($nationName, false);
        seo()->setDescription(is_chinese() 
            ? ($nation['seo_description_zh'] ?? "了解邦国崛起服务器中的{$nationName}邦国详情。")
            : ($nation['seo_description_en'] ?? "Explore {$nationName} nation details on BangGuo Rise server.")
        );
        
        $this->view('nations/show', [
            'nation' => $nation,
        ]);
    }
}