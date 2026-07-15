<?php
class ApiController extends Controller {
    
    public function copyIp() {
        if (!$this->request->isPost()) {
            $this->json(['success' => false, 'message' => 'Invalid request']);
        }
        
        $ip = $this->request->get('ip', 'play.bgjq.top');
        
        $this->json([
            'success' => true,
            'message' => t('copied'),
            'data' => ['ip' => $ip]
        ]);
    }
    
    public function search() {
        $keyword = $this->request->get('keyword', '');
        $type = $this->request->get('type');
        
        if (empty($keyword)) {
            $this->json(['success' => false, 'message' => 'Keyword required']);
        }
        
        $results = content()->search($keyword, $type);
        
        $this->json([
            'success' => true,
            'data' => $results
        ]);
    }
    
    /**
     * 邦国数据 API - 服务端代理请求 markers.json
     */
    public function nations() {
        $cacheFile = __DIR__ . '/../../cache/nations_api.json';
        $cacheDir = dirname($cacheFile);
        $cacheTime = 300; // 5分钟缓存
        
        // 确保缓存目录存在
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        
        // 检查缓存
        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
            $cached = json_decode(file_get_contents($cacheFile), true);
            if ($cached) {
                $this->json(['success' => true, 'data' => $cached]);
            }
        }
        
        // 从 markers.json 获取数据
        $markersUrl = 'http://bgjq.simpfun.cn/tiles/minecraft_overworld/markers.json';
        
        try {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'ignore_errors' => true
                ]
            ]);
            
            $response = file_get_contents($markersUrl, false, $context);
            
            if ($response === false) {
                $this->json(['success' => false, 'message' => 'Failed to fetch data']);
            }
            
            $data = json_decode($response, true);
            
            if (!is_array($data)) {
                $this->json(['success' => false, 'message' => 'Invalid data format']);
            }
            
            $countries = [];
            
            // 找到"疆土"类别
            $nationTerritoryData = null;
            foreach ($data as $item) {
                if (isset($item['name']) && $item['name'] === '疆土' && isset($item['markers']) && is_array($item['markers'])) {
                    $nationTerritoryData = $item;
                    break;
                }
            }
            
            if (!$nationTerritoryData || !isset($nationTerritoryData['markers'])) {
                $this->json(['success' => true, 'data' => []]);
            }
            
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
                        if (preg_match('/「([^」]+)」的王城/u', $capital['popup'], $capitalMatches)) {
                            $capitalName = trim($capitalMatches[1]);
                            $capitalCoords[$capitalName] = $capital['point'];
                        }
                    }
                }
            }
            
            // 从 popup 字段中提取邦国名称和疆土大小
            foreach ($markers as $marker) {
                if (isset($marker['popup']) && isset($marker['points'])) {
                    $popupText = $marker['popup'];
                    if (preg_match('/疆土归属:([^\n\r<]+)/u', $popupText, $matches)) {
                        $countryName = trim($matches[1]);
                        if (!empty($countryName)) {
                            // 计算疆土大小
                            $territorySize = 0;
                            if (isset($marker['points']) && is_array($marker['points'])) {
                                $territorySize = $this->calculateTerritorySize($marker['points']);
                            }
                            
                            // 去重并累加领土
                            $existingKey = array_search($countryName, array_column($countries, 'name'));
                            if ($existingKey !== false) {
                                $countries[$existingKey]['territory_size'] += $territorySize;
                            } else {
                                $countries[] = [
                                    'name' => $countryName,
                                    'territory_size' => $territorySize,
                                    'capital_x' => isset($capitalCoords[$countryName]['x']) ? $capitalCoords[$countryName]['x'] : null,
                                    'capital_z' => isset($capitalCoords[$countryName]['z']) ? $capitalCoords[$countryName]['z'] : null,
                                ];
                            }
                        }
                    }
                }
            }
            
            // 按领土大小排序
            usort($countries, function($a, $b) {
                return $b['territory_size'] - $a['territory_size'];
            });
            
            // 写入缓存
            file_put_contents($cacheFile, json_encode($countries, JSON_UNESCAPED_UNICODE));
            
            $this->json(['success' => true, 'data' => $countries]);
            
        } catch (Exception $e) {
            error_log('API nations error: ' . $e->getMessage());
            $this->json(['success' => false, 'message' => 'Server error']);
        }
    }
    
    // 计算疆土面积（区块数）
    private function calculateTerritorySize($points) {
        $totalArea = 0;
        
        foreach ($points as $polygonGroup) {
            if (is_array($polygonGroup)) {
                foreach ($polygonGroup as $polygon) {
                    if (is_array($polygon) && count($polygon) >= 3) {
                        $area = $this->calculatePolygonArea($polygon);
                        $totalArea += abs($area);
                    }
                }
            }
        }
        
        return ceil($totalArea / 256);
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
}
