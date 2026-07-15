<?php
class Session {
    
    private static $started = false;
    
    public static function start() {
        if (self::$started) {
            return;
        }
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        self::$started = true;
        
        if (!self::has('lang')) {
            $lang = $_GET['lang'] ?? 'zh';
            if (!in_array($lang, ['zh', 'en'])) {
                $lang = 'zh';
            }
            self::set('lang', $lang);
        }
    }
    
    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function has($key) {
        return isset($_SESSION[$key]);
    }
    
    public static function forget($key) {
        unset($_SESSION[$key]);
    }
    
    public static function flash($key, $value = null) {
        if ($value === null) {
            $value = self::get('_flash_' . $key);
            self::forget('_flash_' . $key);
            return $value;
        }
        
        self::set('_flash_' . $key, $value);
    }
    
    public static function destroy() {
        if (self::$started && session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        self::$started = false;
    }
    
    public static function regenerate() {
        if (self::$started && session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }
}
