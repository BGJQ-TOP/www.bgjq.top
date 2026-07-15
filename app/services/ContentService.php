<?php
class ContentService {
    
    private static $instance = null;
    private $db = null;
    
    private function __construct() {
        $this->db = Database::getInstance();
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getMusicList($page = 1, $perPage = 20, $status = 1) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM bgjq_music WHERE status = ? ORDER BY publish_time DESC LIMIT ? OFFSET ?";
        
        return $this->db->select($sql, [$status, $perPage, $offset]);
    }
    
    public function getMusicById($id) {
        $sql = "SELECT * FROM bgjq_music WHERE id = ?";
        return $this->db->selectOne($sql, [$id]);
    }
    
    public function getVideoList($page = 1, $perPage = 20, $status = 1) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM bgjq_video WHERE status = ? ORDER BY publish_time DESC LIMIT ? OFFSET ?";
        
        return $this->db->select($sql, [$status, $perPage, $offset]);
    }
    
    public function getVideoById($id) {
        $sql = "SELECT * FROM bgjq_video WHERE id = ?";
        return $this->db->selectOne($sql, [$id]);
    }
    
    public function getWorldviewList($page = 1, $perPage = 20, $status = 1, $type = null) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM bgjq_worldview WHERE status = ?";
        $params = [$status];
        
        if ($type) {
            $sql .= " AND content_type = ?";
            $params[] = $type;
        }
        
        $sql .= " ORDER BY publish_time DESC LIMIT ? OFFSET ?";
        $params[] = $perPage;
        $params[] = $offset;
        
        return $this->db->select($sql, $params);
    }
    
    public function getWorldviewById($id) {
        $sql = "SELECT * FROM bgjq_worldview WHERE id = ?";
        return $this->db->selectOne($sql, [$id]);
    }
    
    public function getNationList($page = 1, $perPage = 20, $status = 1) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM bgjq_nations WHERE status = ? ORDER BY create_time DESC LIMIT ? OFFSET ?";
        
        return $this->db->select($sql, [$status, $perPage, $offset]);
    }
    
    public function getNationBySlug($slug) {
        $sql = "SELECT * FROM bgjq_nations WHERE slug = ? AND status = 1";
        return $this->db->selectOne($sql, [$slug]);
    }
    
    public function getAnnouncementList($page = 1, $perPage = 10, $status = 1) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM bgjq_announcements WHERE status = ? ORDER BY is_top DESC, publish_time DESC LIMIT ? OFFSET ?";
        
        return $this->db->select($sql, [$status, $perPage, $offset]);
    }
    
    public function getAnnouncementById($id) {
        $sql = "SELECT * FROM bgjq_announcements WHERE id = ?";
        return $this->db->selectOne($sql, [$id]);
    }
    
    public function getCreatorById($id) {
        $sql = "SELECT * FROM bgjq_creators WHERE id = ?";
        return $this->db->selectOne($sql, [$id]);
    }
    
    public function search($keyword, $type = null, $page = 1, $perPage = 20) {
        $offset = ($page - 1) * $perPage;
        
        $tables = [
            'music' => 'bgjq_music',
            'video' => 'bgjq_video',
            'worldview' => 'bgjq_worldview',
            'announcement' => 'bgjq_announcements',
        ];
        
        $results = [];
        
        if ($type && isset($tables[$type])) {
            $table = $tables[$type];
            $sql = "SELECT * FROM {$table} WHERE status = 1 AND (title_zh LIKE ? OR title_en LIKE ? OR content_zh LIKE ? OR content_en LIKE ?) LIMIT ? OFFSET ?";
            $like = "%{$keyword}%";
            $results = $this->db->select($sql, [$like, $like, $like, $like, $perPage, $offset]);
        } else {
            foreach ($tables as $typeName => $table) {
                $sql = "SELECT * FROM {$table} WHERE status = 1 AND (title_zh LIKE ? OR title_en LIKE ?) LIMIT 5";
                $like = "%{$keyword}%";
                $items = $this->db->select($sql, [$like, $like]);
                
                foreach ($items as &$item) {
                    $item['_type'] = $typeName;
                }
                
                $results = array_merge($results, $items);
            }
        }
        
        return $results;
    }
    
    public function incrementViewCount($table, $id) {
        $sql = "UPDATE {$table} SET view_count = view_count + 1 WHERE id = ?";
        $this->db->query($sql, [$id]);
    }
}

function content() {
    return ContentService::getInstance();
}
