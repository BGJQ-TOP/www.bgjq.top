<?php

require_once APP_SERVICE_PATH . '/MarkdownParser.php';

class ArchivesService {
    
    private $parser;
    private $db = null;
    private $useDatabase = false;
    
    public function __construct() {
        $this->parser = MarkdownParser::getInstance();
        $this->initDatabase();
    }
    
    private function initDatabase() {
        try {
            $config = require CONFIG_PATH . '/database.php';
            $this->db = Database::connectBgjq($config);
            $this->useDatabase = true;
        } catch (Exception $e) {
            $this->useDatabase = false;
        }
    }
    
    public function getCatalog() {
        if ($this->useDatabase && $this->db) {
            return $this->getCatalogFromDb();
        }
        return $this->getCatalogFromArray();
    }
    
    private function getCatalogFromDb() {
        $volumes = $this->db->select("SELECT * FROM bgjq_worldview_volumes ORDER BY sort_order");
        
        $catalog = [
            'title' => '邦国文库',
            'subtitle' => '邦国崛起服务器史书 · 国别体',
            'volumes' => []
        ];
        
        foreach ($volumes as $volume) {
            $documents = $this->db->select(
                "SELECT id, title, file FROM bgjq_worldview_documents WHERE volume_id = ? ORDER BY sort_order",
                [$volume['id']]
            );
            
            $catalog['volumes'][] = [
                'id' => $volume['id'],
                'title' => $volume['title'],
                'description' => $volume['description'],
                'path' => $volume['path'],
                'documents' => $documents
            ];
        }
        
        return $catalog;
    }
    
    private function getCatalogFromArray() {
        return [
            'title' => '邦国文库',
            'subtitle' => '邦国崛起服务器史书 · 国别体',
            'volumes' => [
                [
                    'id' => 'vol1',
                    'title' => '卷一·新世记',
                    'description' => '一周目历史，各邦国势力竞相崛起。',
                    'path' => '卷一-新世记',
                    'documents' => [
                        ['id' => 'frankweiya', 'title' => '法兰维亚帝国', 'file' => '法兰维亚帝国.md'],
                        ['id' => 'naruto', 'title' => '幻影忍者王国', 'file' => '幻影忍者王国.md'],
                        ['id' => 'nishi', 'title' => '逆熵', 'file' => '逆熵.md'],
                        ['id' => 'lamanqia', 'title' => '拉曼却公国', 'file' => '拉曼却公国.md'],
                        ['id' => 'liangshan', 'title' => '梁山泊国', 'file' => '梁山泊国.md'],
                        ['id' => 'fujian', 'title' => '伏见稻荷狐域', 'file' => '伏见稻荷狐域.md'],
                        ['id' => 'bod', 'title' => 'Blood of Death', 'file' => 'Blood of Death.md'],
                    ]
                ],
                [
                    'id' => 'vol2',
                    'title' => '卷二·旧世记',
                    'description' => '零周目历史，一周目之先声。',
                    'path' => '卷二-旧世记',
                    'documents' => [
                        ['id' => 'ling', 'title' => '零周目概略', 'file' => '零周目概略.md'],
                    ]
                ],
                [
                    'id' => 'vol3',
                    'title' => '卷三·刊物志',
                    'description' => '玩家创办之刊物记录。',
                    'path' => '卷三-刊物志',
                    'documents' => [
                        ['id' => 'goujiao', 'title' => '狗叫时报', 'file' => '狗叫时报.md'],
                        ['id' => 'babil', 'title' => '巴别塔通讯社', 'file' => '巴别塔通讯社.md'],
                        ['id' => 'qi_e', 'title' => '企鹅快讯', 'file' => '企鹅快讯.md'],
                        ['id' => 'zhenli', 'title' => '真理报', 'file' => '真理报.md'],
                    ]
                ],
                [
                    'id' => 'vol4',
                    'title' => '卷四·轶事志',
                    'description' => '服务器奇闻轶事。',
                    'path' => '卷四-轶事志',
                    'documents' => [
                        ['id' => 'nixtian', 'title' => '逆天墙', 'file' => '逆天墙.md'],
                        ['id' => 'zuiren', 'title' => '罪人特辑', 'file' => '罪人特辑.md'],
                        ['id' => 'shenren', 'title' => '神人大全', 'file' => '神人大全.md'],
                    ]
                ],
                [
                    'id' => 'appendix',
                    'title' => '附录',
                    'description' => '大事年表与友链。',
                    'path' => '附录',
                    'documents' => [
                        ['id' => 'dashiji', 'title' => '大事年表', 'file' => '大事年表.md'],
                        ['id' => 'youlian', 'title' => '友链', 'file' => '友链.md'],
                    ]
                ]
            ]
        ];
    }
    
    public function getDocumentContent($volumePath, $filename) {
        if ($this->useDatabase && $this->db) {
            return $this->getContentFromDb($volumePath, $filename);
        }
        return null;
    }
    
    private function getContentFromDb($volumePath, $filename) {
        $docId = $this->resolveDocId($volumePath, $filename);
        if (!$docId) {
            return null;
        }
        
        $row = $this->db->selectOne(
            "SELECT html_content, raw_content, title FROM bgjq_worldview_contents WHERE id = ?",
            [$docId]
        );
        
        if (!$row) {
            return null;
        }
        
        return [
            'raw' => $row['raw_content'],
            'html' => $row['html_content'],
            'title' => $row['title']
        ];
    }
    
    private function resolveDocId($volumePath, $filename) {
        $catalog = $this->getCatalog();
        foreach ($catalog['volumes'] as $volume) {
            if ($volume['path'] === $volumePath) {
                foreach ($volume['documents'] as $doc) {
                    if ($doc['file'] === $filename) {
                        return $doc['id'];
                    }
                }
            }
        }
        return null;
    }

    private function resolveVolumeId($volumePath) {
        $catalog = $this->getCatalog();
        foreach ($catalog['volumes'] as $volume) {
            if ($volume['path'] === $volumePath) {
                return $volume['id'];
            }
        }
        return null;
    }
    
    public function getDocumentContentById($volumeId, $docId) {
        $catalog = $this->getCatalog();
        
        foreach ($catalog['volumes'] as $volume) {
            if ($volume['id'] === $volumeId) {
                foreach ($volume['documents'] as $doc) {
                    if ($doc['id'] === $docId) {
                        return [
                            'volume' => $volume,
                            'document' => $doc,
                            'content' => $this->getDocumentContent($volume['path'], $doc['file'])
                        ];
                    }
                }
            }
        }
        
        return null;
    }
    
    public function getPreface() {
        if ($this->useDatabase && $this->db) {
            $row = $this->db->selectOne("SELECT html_content, raw_content, title FROM bgjq_worldview_preface LIMIT 1");
            if ($row) {
                return [
                    'title' => $row['title'],
                    'html' => $row['html_content'],
                    'raw' => $row['raw_content']
                ];
            }
        }
        
        return null;
    }
    
    public function refreshCache($basePath = null) {
        return false;
    }
}
