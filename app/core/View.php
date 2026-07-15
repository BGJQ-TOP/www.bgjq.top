<?php
class View {
    
    private static $data = [];
    
    public static function render($template, $data = []) {
        self::$data = array_merge(self::$data, $data);
        
        extract(self::$data);
        
        $templatePath = VIEW_PATH . '/' . $template . '.php';
        
        if (!file_exists($templatePath)) {
            die("Template not found: {$template}");
        }
        
        include $templatePath;
        
        self::$data = [];
    }
    
    public static function make($template) {
        return new ViewBuilder($template);
    }
    
    public static function share($key, $value) {
        self::$data[$key] = $value;
    }
    
    public static function getData($key = null) {
        if ($key === null) {
            return self::$data;
        }
        
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }
}

class ViewBuilder {
    
    private $template;
    private $data = [];
    
    public function __construct($template) {
        $this->template = $template;
    }
    
    public function with($key, $value) {
        $this->data[$key] = $value;
        return $this;
    }
    
    public function withData($data) {
        $this->data = array_merge($this->data, $data);
        return $this;
    }
    
    public function render() {
        View::render($this->template, $this->data);
    }
    
    public function __toString() {
        ob_start();
        $this->render();
        return ob_get_clean();
    }
}
