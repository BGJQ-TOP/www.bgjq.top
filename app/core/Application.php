<?php
class Application {
    
    private static $instance = null;
    private $config = null;
    private $router = null;
    private $db = null;
    
    private function __construct() {}
    
    public static function run() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        self::$instance->init();
        self::$instance->handleRequest();
    }
    
    private function init() {
        $this->config = Config::getInstance();
        
        Session::start();
        
        $dbConfig = [
            'driver' => $this->config->get('driver', 'mysql'),
            'host' => $this->config->get('host', 'localhost'),
            'port' => $this->config->get('port', 3306),
            'database' => $this->config->get('database', ''),
            'username' => $this->config->get('username', 'root'),
            'password' => $this->config->get('password', ''),
            'charset' => $this->config->get('charset', 'utf8mb4'),
            'collation' => $this->config->get('collation', 'utf8mb4_unicode_ci'),
            'prefix' => $this->config->get('prefix', ''),
            'strict' => $this->config->get('strict', false),
            'engine' => $this->config->get('engine', 'InnoDB'),
        ];
        
        Database::connect($dbConfig);
        
        $this->router = new Router();
    }
    
    private function handleRequest() {
        $request = new Request();
        
        $this->router->dispatch($request);
    }
    
    public static function getInstance() {
        return self::$instance;
    }
    
    public function getConfig() {
        return $this->config;
    }
    
    public function getRouter() {
        return $this->router;
    }
    
    public function getDb() {
        return $this->db;
    }
}
