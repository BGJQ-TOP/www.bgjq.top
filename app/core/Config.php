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
        // 加载 .env 环境变量到 PHP
        $this->loadEnv(APP_PATH . '/.env');
        
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
    
    private function loadEnv($path) {
        if (!file_exists($path)) {
            return;
        }
        
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }
        
        foreach ($lines as $line) {
            $line = trim($line);
            
            // 跳过注释和空行
            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }
            
            // 解析 KEY=VALUE
            if (strpos($line, '=') === false) {
                continue;
            }
            
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // 移除可能的引号
            if ((strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) ||
                (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1)) {
                $value = substr($value, 1, -1);
            }
            
            if ($key !== '' && !array_key_exists($key, $_ENV) && !array_key_exists($key, $_SERVER)) {
                putenv("{$key}={$value}");
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }
}
