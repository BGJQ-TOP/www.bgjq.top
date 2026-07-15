<?php
class Config {
    
    private static $instance = null;
    private $config = [];
    
    private function __construct() {
        $this->loadConfig();
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function loadConfig() {
        $configFiles = [
            'app.php',
            'database.php',
            'seo.php',
            'bilingual.php'
        ];
        
        foreach ($configFiles as $file) {
            $path = CONFIG_PATH . '/' . $file;
            if (file_exists($path)) {
                $config = require $path;
                if (is_array($config)) {
                    $this->config = array_merge($this->config, $config);
                } else {
                    error_log("Warning: Config file {$path} does not return an array, got: " . gettype($config));
                    if (is_string($config)) {
                        error_log("Content: " . substr($config, 0, 200));
                    }
                }
            } else {
                error_log("Warning: Config file not found: {$path}");
            }
        }
        
        error_log("Loaded config keys: " . implode(', ', array_keys($this->config)));
    }
    
    public function get($key, $default = null) {
        $keys = explode('.', $key);
        $value = $this->config;
        
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }
        
        return $value;
    }
    
    public function set($key, $value) {
        $keys = explode('.', $key);
        $config = &$this->config;
        
        foreach ($keys as $k) {
            if (!isset($config[$k])) {
                $config[$k] = [];
            }
            $config = &$config[$k];
        }
        
        $config = $value;
    }
    
    public function all() {
        return $this->config;
    }
}
