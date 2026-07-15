<?php
class SitemapController extends Controller {
    
    private $baseUrl = 'https://www.bgjq.top';
    
    public function update() {
        // 加载 IndexNow 服务
        require_once APP_SERVICE_PATH . '/IndexNowService.php';
        
        $dbError = null;
        
        // 初始化数据库连接
        try {
            $dbConfigFile = CONFIG_PATH . '/database.php';
            if (file_exists($dbConfigFile)) {
                $dbConfig = require $dbConfigFile;
                if (is_array($dbConfig)) {
                    $requiredKeys = ['host', 'database', 'username', 'password'];
                    foreach ($requiredKeys as $key) {
                        if (!isset($dbConfig[$key])) {
                            throw new Exception('Database config missing required key: ' . $key);
                        }
                    }
                    Database::connect($dbConfig);
                } else {
                    throw new Exception('Database config must be an array');
                }
            } else {
                throw new Exception('Database config file not found');
            }
        } catch (Exception $e) {
            $dbError = "Database connection failed: " . $e->getMessage();
            error_log($dbError);
        }
        
        // 加载视图
        return View::make('pages/update-sitemap', [
            'baseUrl' => $this->baseUrl,
            'dbError' => $dbError
        ]);
    }
    
    public function index() {
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        header('Content-Type: application/xml; charset=utf-8');
        header('Cache-Control: max-age=3600, public');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $sitemaps = [
            ['loc' => $this->baseUrl . '/sitemap-pages.xml', 'priority' => '1.0'],
            ['loc' => $this->baseUrl . '/sitemap-music.xml', 'priority' => '0.8'],
            ['loc' => $this->baseUrl . '/sitemap-video.xml', 'priority' => '0.8'],
            ['loc' => $this->baseUrl . '/sitemap-archives.xml', 'priority' => '0.8'],
            ['loc' => $this->baseUrl . '/sitemap-worldview.xml', 'priority' => '0.8'],
            ['loc' => $this->baseUrl . '/sitemap-nations.xml', 'priority' => '0.8'],
            ['loc' => $this->baseUrl . '/sitemap-announcements.xml', 'priority' => '0.8'],
            ['loc' => 'https://wiki.bgjq.top/sitemap.xml', 'priority' => '0.7'],
            ['loc' => 'https://img.bgjq.top/sitemap.xml', 'priority' => '0.7'],
        ];

        foreach ($sitemaps as $sm) {
            $xml .= '  <sitemap>' . "\n";
            $xml .= '    <loc>' . $sm['loc'] . '</loc>' . "\n";
            $xml .= '    <lastmod>' . date('c') . '</lastmod>' . "\n";
            $xml .= '  </sitemap>' . "\n";
        }

        $xml .= '</sitemapindex>' . "\n";

        return $xml;
    }
    
    public function type() {
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        $type = $this->request->get('type', 'pages');

        header('Content-Type: application/xml; charset=utf-8');
        header('Cache-Control: max-age=3600, public');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        switch ($type) {
            case 'pages':
                $xml .= $this->getPagesSitemapXml();
                break;
            case 'music':
                $xml .= $this->getMusicSitemapXml();
                break;
            case 'video':
                $xml .= $this->getVideoSitemapXml();
                break;
            case 'archives':
                $xml .= $this->getArchivesSitemapXml();
                break;
            case 'nations':
                $xml .= $this->getNationsSitemapXml();
                break;
            case 'announcements':
                $xml .= $this->getAnnouncementsSitemapXml();
                break;
            case 'worldview':
                $xml .= $this->getWorldviewSitemapXml();
                break;
        }

        $xml .= '</urlset>' . "\n";

        return $xml;
    }
    
    private function getPagesSitemapXml() {
        $xml = '';
        $pages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => '/music', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/video', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/archives', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/worldview', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/nations', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['url' => '/announcements', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['url' => '/guide', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => '/fanworks', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => '/creator', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => '/about', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/privacy', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['url' => '/terms', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['url' => '/contact', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['url' => '/copyright', 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        foreach ($pages as $page) {
            $xml .= $this->getUrlXml($this->baseUrl . $page['url'] . '?lang=zh', $page['priority'], $page['changefreq']);
            $xml .= $this->getUrlXml($this->baseUrl . $page['url'] . '?lang=en', $page['priority'], $page['changefreq']);
        }
        
        $xml .= $this->getUrlXml($this->baseUrl . '/nations?lang=en', '0.8', 'daily');
        $xml .= $this->getUrlXml($this->baseUrl . '/announcements?lang=en', '0.8', 'daily');
        $xml .= $this->getUrlXml($this->baseUrl . '/privacy?lang=en', '0.5', 'monthly');
        $xml .= $this->getUrlXml($this->baseUrl . '/video?lang=en', '0.9', 'daily');
        
        // 添加 worldview 页面的各种类型
        $types = ['story', 'chronicle', 'nation', 'term'];
        foreach ($types as $type) {
            $xml .= $this->getUrlXml($this->baseUrl . '/worldview?lang=en&type=' . $type, '0.8', 'daily');
        }

        return $xml;
    }
    
    private function getMusicSitemapXml() {
        $xml = '';
        try {
            $list = content()->getMusicList(1, 100);

            foreach ($list as $item) {
                $detailUrl = $this->baseUrl . '/music/' . $item['id'];
                $lastmod = !empty($item['publish_time']) ? date('c', strtotime($item['publish_time'])) : null;

                $xml .= $this->getUrlXml($detailUrl . '?lang=zh', '0.7', 'weekly', $lastmod);
                $xml .= $this->getUrlXml($detailUrl . '?lang=en', '0.7', 'weekly', $lastmod);
            }
        } catch (Exception $e) {
            error_log('Sitemap Music Error: ' . $e->getMessage());
        }
        return $xml;
    }

    private function getVideoSitemapXml() {
        $xml = '';
        try {
            $list = content()->getVideoList(1, 100);

            foreach ($list as $item) {
                $detailUrl = $this->baseUrl . '/video/' . $item['id'];
                $lastmod = !empty($item['publish_time']) ? date('c', strtotime($item['publish_time'])) : null;

                $xml .= $this->getUrlXml($detailUrl . '?lang=zh', '0.7', 'weekly', $lastmod);
                $xml .= $this->getUrlXml($detailUrl . '?lang=en', '0.7', 'weekly', $lastmod);
            }
        } catch (Exception $e) {
            error_log('Sitemap Video Error: ' . $e->getMessage());
        }
        return $xml;
    }

    private function getArchivesSitemapXml() {
        $xml = '';
        $xml .= $this->getUrlXml($this->baseUrl . '/archives?lang=zh', '0.9', 'weekly');
        $xml .= $this->getUrlXml($this->baseUrl . '/archives?lang=en', '0.9', 'weekly');
        return $xml;
    }
    
    private function getWorldviewSitemapXml() {
        $xml = '';
        $xml .= $this->getUrlXml($this->baseUrl . '/worldview?lang=zh', '0.9', 'weekly');
        $xml .= $this->getUrlXml($this->baseUrl . '/worldview?lang=en', '0.9', 'weekly');
        
        // 添加 worldview 页面的各种类型
        $types = ['story', 'chronicle', 'nation', 'term'];
        foreach ($types as $type) {
            $xml .= $this->getUrlXml($this->baseUrl . '/worldview?lang=zh&type=' . $type, '0.8', 'weekly');
            $xml .= $this->getUrlXml($this->baseUrl . '/worldview?lang=en&type=' . $type, '0.8', 'weekly');
        }
        
        // 从数据库获取更多 worldview 页面
        try {
            $db = Database::getInstance();
            $worldviewPages = $db->select("SELECT id, title_zh, title_en, content_type, publish_time FROM bgjq_worldview");
            
            foreach ($worldviewPages as $page) {
                $contentType = $page['content_type'] ?? 'story';
                $lastmod = !empty($page['publish_time']) ? date('c', strtotime($page['publish_time'])) : date('c');
                
                $xml .= $this->getUrlXml(
                    $this->baseUrl . '/worldview/' . $page['id'] . '?lang=zh&type=' . $contentType,
                    '0.7', 'weekly', $lastmod
                );
                $xml .= $this->getUrlXml(
                    $this->baseUrl . '/worldview/' . $page['id'] . '?lang=en&type=' . $contentType,
                    '0.7', 'weekly', $lastmod
                );
            }
        } catch (Exception $e) {
            error_log('Sitemap Worldview Database Error: ' . $e->getMessage());
        }
        
        return $xml;
    }

    private function getNationsSitemapXml() {
        $xml = '';
        try {
            // 从 markers.json 在线获取邦国列表
            $markersUrl = 'http://bgjq.simpfun.cn/tiles/minecraft_overworld/markers.json';
            
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
                        
                        // 从 popup 字段中提取邦国名称
                        foreach ($markers as $marker) {
                            if (isset($marker['popup'])) {
                                $popupText = $marker['popup'];
                                // popup 格式使用半角冒号
                                if (preg_match('/疆土归属:([^\n\r<]+)/u', $popupText, $matches)) {
                                    $countryName = trim($matches[1]);
                                    if (!empty($countryName)) {
                                        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $countryName), '-'));
                                        if (!in_array($slug, array_column($countries, 'slug'))) {
                                            $countries[] = [
                                                'slug' => $slug ?: 'nation',
                                                'create_time' => date('Y-m-d H:i:s'),
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    foreach ($countries as $item) {
                        $detailUrl = $this->baseUrl . '/nations/' . $item['slug'];
                        $lastmod = !empty($item['create_time']) ? date('c', strtotime($item['create_time'])) : null;

                        $xml .= $this->getUrlXml($detailUrl . '?lang=zh', '0.7', 'weekly', $lastmod);
                        $xml .= $this->getUrlXml($detailUrl . '?lang=en', '0.7', 'weekly', $lastmod);
                    }
                }
            }
        } catch (Exception $e) {
            error_log('Sitemap Nations Error: ' . $e->getMessage());
        }
        return $xml;
    }

    private function getAnnouncementsSitemapXml() {
        $xml = '';
        try {
            $list = content()->getAnnouncementList(1, 100);

            foreach ($list as $item) {
                $detailUrl = $this->baseUrl . '/announcements/' . $item['id'];
                $lastmod = !empty($item['publish_time']) ? date('c', strtotime($item['publish_time'])) : null;

                $xml .= $this->getUrlXml($detailUrl . '?lang=zh', '0.6', 'daily', $lastmod);
                $xml .= $this->getUrlXml($detailUrl . '?lang=en', '0.6', 'daily', $lastmod);
            }
        } catch (Exception $e) {
            error_log('Sitemap Announcements Error: ' . $e->getMessage());
        }
        return $xml;
    }

    private function getUrlXml($loc, $priority, $changefreq, $lastmod = null) {
        $xml = '  <url>' . "\n";
        $xml .= '    <loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . '</loc>' . "\n";

        if ($lastmod) {
            $xml .= '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
        }

        $xml .= '    <changefreq>' . $changefreq . '</changefreq>' . "\n";
        $xml .= '    <priority>' . $priority . '</priority>' . "\n";

        $parsed = parse_url($loc);
        $baseUrl = $parsed['scheme'] . '://' . $parsed['host'] . $parsed['path'];
        parse_str($parsed['query'] ?? '', $query);
        
        if (isset($query['lang'])) {
            $currentLang = $query['lang'];
            unset($query['lang']);
            $baseQuery = $query;
            
            $zhUrl = $baseUrl . '?' . http_build_query(array_merge($baseQuery, ['lang' => 'zh']));
            $enUrl = $baseUrl . '?' . http_build_query(array_merge($baseQuery, ['lang' => 'en']));
            
            $xml .= '    <xhtml:link rel="alternate" hreflang="zh-CN" href="' . htmlspecialchars($zhUrl, ENT_XML1, 'UTF-8') . '"/>' . "\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($enUrl, ENT_XML1, 'UTF-8') . '"/>' . "\n";
        }

        $xml .= '  </url>' . "\n";

        return $xml;
    }
}