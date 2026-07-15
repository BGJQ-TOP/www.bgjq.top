<?php
class Response {
    
    private $content;
    private $statusCode = 200;
    private $headers = [];
    
    public function __construct($content = '', $statusCode = 200) {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }
    
    public static function make($content = '', $statusCode = 200) {
        return new self($content, $statusCode);
    }
    
    public static function json($data, $statusCode = 200) {
        $response = new self(json_encode($data, JSON_UNESCAPED_UNICODE), $statusCode);
        $response->setHeader('Content-Type', 'application/json; charset=utf-8');
        return $response;
    }
    
    public static function redirect($url, $statusCode = 302) {
        $response = new self('', $statusCode);
        $response->setHeader('Location', $url);
        return $response;
    }
    
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    public function getStatusCode() {
        return $this->statusCode;
    }
    
    public function setHeader($key, $value) {
        $this->headers[$key] = $value;
        return $this;
    }
    
    public function getHeaders() {
        return $this->headers;
    }
    
    public function send() {
        http_response_code($this->statusCode);
        
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
        
        echo $this->content;
    }
    
    public function __toString() {
        return $this->content;
    }
}
