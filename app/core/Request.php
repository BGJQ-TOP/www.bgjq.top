<?php
class Request {
    
    private $method;
    private $path;
    private $query;
    private $post;
    private $headers;
    private $lang = 'zh';
    
    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $this->parsePath();
        $this->query = $_GET;
        $this->post = $_POST;
        $this->headers = $this->parseHeaders();
    }
    
    private function parsePath() {
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH);
        
        $path = rtrim($path, '/');
        
        if (empty($path)) {
            $path = '/';
        }
        
        return $path;
    }
    
    private function parseHeaders() {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
                $headers[$header] = $value;
            }
        }
        return $headers;
    }
    
    public function getMethod() {
        return $this->method;
    }
    
    public function getPath() {
        return $this->path;
    }
    
    public function get($key, $default = null) {
        if (isset($this->query[$key])) {
            return $this->query[$key];
        }
        
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }
        
        return $default;
    }
    
    public function all() {
        return array_merge($this->query, $this->post);
    }
    
    public function only($keys) {
        $data = $this->all();
        $result = [];
        
        foreach ((array)$keys as $key) {
            if (isset($data[$key])) {
                $result[$key] = $data[$key];
            }
        }
        
        return $result;
    }
    
    public function has($key) {
        return isset($this->query[$key]) || isset($this->post[$key]);
    }

    public function set($key, $value) {
        $this->query[$key] = $value;
    }
    
    public function getHeader($key, $default = null) {
        $key = str_replace(' ', '-', ucwords(str_replace('-', ' ', strtolower($key))));
        return $this->headers[$key] ?? $default;
    }
    
    public function isAjax() {
        return $this->getHeader('X-Requested-With') === 'XMLHttpRequest';
    }
    
    public function isGet() {
        return $this->method === 'GET';
    }
    
    public function isPost() {
        return $this->method === 'POST';
    }
    
    public function getLang() {
        return $this->lang;
    }
    
    public function setLang($lang) {
        $this->lang = $lang;
    }
    
    public function getIp() {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ips[0]);
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
    
    public function getUserAgent() {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }
    
    public function getFullUrl() {
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        
        return $scheme . '://' . $host . $uri;
    }
}
