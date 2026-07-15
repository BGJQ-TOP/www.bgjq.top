<?php
class IndexNowService {
    
    private static $instance = null;
    private $config = null;
    private $apiKey = '';
    private $enabled = false;
    
    private function __construct() {
        $this->config = Config::getInstance();
        $this->enabled = $this->config->get('seo.indexnow.enabled', false);
        $this->apiKey = $this->config->get('seo.indexnow.api_key', '');
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function submit($url, $lang = 'zh') {
        if (!$this->enabled) {
            return ['success' => false, 'message' => 'IndexNow disabled'];
        }
        
        if (empty($this->apiKey)) {
            return ['success' => false, 'message' => 'API key not configured'];
        }
        
        $endpoints = $this->config->get('seo.indexnow.endpoints', []);
        
        $payload = json_encode([
            'url' => $url,
            'key' => $this->apiKey,
        ]);
        
        foreach ($endpoints as $endpoint) {
            $result = $this->sendRequest($endpoint, $payload);
            
            if ($result['success']) {
                $this->logSubmission($url, $lang, 'success', $result['status'] ?? 200);
                return $result;
            }
        }
        
        $this->logSubmission($url, $lang, 'failed', 0);
        
        return ['success' => false, 'message' => 'All endpoints failed'];
    }
    
    private function sendRequest($endpoint, $payload) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        
        curl_close($ch);
        
        if ($error) {
            return ['success' => false, 'message' => $error, 'status' => 0];
        }
        
        if ($statusCode === 200 || $statusCode === 202) {
            return ['success' => true, 'message' => 'OK', 'status' => $statusCode];
        }
        
        return ['success' => false, 'message' => $response, 'status' => $statusCode];
    }
    
    public function submitBilingual($url, $contentId = 0, $contentType = '') {
        $results = [];
        
        $urlZh = $url . (strpos($url, '?') !== false ? '&' : '?') . 'lang=zh';
        $results['zh'] = $this->submit($urlZh, 'zh');
        
        $urlEn = $url . (strpos($url, '?') !== false ? '&' : '?') . 'lang=en';
        $results['en'] = $this->submit($urlEn, 'en');
        
        return $results;
    }
    
    private function logSubmission($url, $lang, $status, $httpCode) {
        $db = Database::getInstance();
        
        $db->insert('bgjq_indexnow_log', [
            'url' => $url,
            'url_md5' => md5($url),
            'language' => $lang,
            'response_status' => $httpCode,
            'status' => $status === 'success' ? 1 : 2,
            'submit_time' => date('Y-m-d H:i:s'),
            'create_time' => date('Y-m-d H:i:s'),
        ]);
    }
    
    public function getStats() {
        $db = Database::getInstance();
        
        $today = date('Y-m-d');
        
        $total = $db->selectOne("SELECT COUNT(*) as count FROM bgjq_indexnow_log WHERE DATE(submit_time) = ?", [$today]);
        $success = $db->selectOne("SELECT COUNT(*) as count FROM bgjq_indexnow_log WHERE DATE(submit_time) = ? AND status = 1", [$today]);
        
        return [
            'today_total' => $total['count'] ?? 0,
            'today_success' => $success['count'] ?? 0,
        ];
    }
}

function indexnow() {
    return IndexNowService::getInstance();
}
