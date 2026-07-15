<?php
class BilingualService {
    
    private static $instance = null;
    private $config = null;
    private $currentLang = 'zh';
    private $translations = [];
    
    private function __construct() {
        $this->config = Config::getInstance();
        $this->loadTranslations();
        $this->detectLanguage();
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function loadTranslations() {
        $this->translations = $this->config->get('translations', []);
    }
    
    private function detectLanguage() {
        $langParam = $this->config->get('lang_param', 'lang');
        
        $lang = $_GET[$langParam] ?? Session::get('lang', 'zh');
        
        $supportedLangs = $this->config->get('supported_langs', ['zh', 'en']);
        
        if (!in_array($lang, $supportedLangs)) {
            $lang = $this->config->get('default_lang', 'zh');
        }
        
        $this->currentLang = $lang;
        
        Session::set('lang', $lang);
    }
    
    public function getCurrentLang() {
        return $this->currentLang;
    }
    
    public function isChinese() {
        return $this->currentLang === 'zh';
    }
    
    public function isEnglish() {
        return $this->currentLang === 'en';
    }
    
    public function t($key) {
        if (isset($this->translations[$this->currentLang][$key])) {
            return $this->translations[$this->currentLang][$key];
        }
        
        if (isset($this->translations['zh'][$key])) {
            return $this->translations['zh'][$key];
        }
        
        return $key;
    }
    
    public function getTranslations() {
        return $this->translations[$this->currentLang] ?? [];
    }
    
    public function getLangUrl($lang = null) {
        if ($lang === null) {
            return $this->currentLang;
        }
        
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $parsed = parse_url($currentUrl);
        
        parse_str($parsed['query'] ?? '', $query);
        
        $query[$this->config->get('lang_param', 'lang')] = $lang;
        
        $url = $parsed['path'] ?? '/';
        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }
        
        return $url;
    }
    
    public function switchLangUrl($targetLang) {
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $parsed = parse_url($currentUrl);
        
        parse_str($parsed['query'] ?? '', $query);
        
        $query[$this->config->get('lang_param', 'lang')] = $targetLang;
        
        $url = $parsed['path'] ?? '/';
        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }
        
        return $url;
    }
    
    public function getContentField($content, $field) {
        $langField = $field . '_' . $this->currentLang;
        
        if (isset($content[$langField]) && !empty($content[$langField])) {
            return $content[$langField];
        }
        
        $fallbackField = $field . '_zh';
        if (isset($content[$fallbackField])) {
            return $content[$fallbackField];
        }
        
        return $content[$field] ?? '';
    }
    
    public function getTitle($content) {
        return $this->getContentField($content, 'title');
    }
    
    public function getDescription($content) {
        return $this->getContentField($content, 'description');
    }
    
    public function getContent($content) {
        return $this->getContentField($content, 'content');
    }
    
    public function getKeywords($content) {
        return $this->getContentField($content, 'keywords');
    }
    
    public function formatUrlWithLang($url) {
        if (empty($url)) {
            return $url;
        }
        
        $parsed = parse_url($url);
        
        if (!isset($parsed['query'])) {
            $parsed['query'] = '';
        }
        
        parse_str($parsed['query'], $query);
        
        if (!isset($query['lang'])) {
            $query['lang'] = $this->currentLang;
            
            $newUrl = $parsed['path'] ?? '/';
            if (!empty($query)) {
                $newUrl .= '?' . http_build_query($query);
            }
            if (isset($parsed['fragment'])) {
                $newUrl .= '#' . $parsed['fragment'];
            }
            
            return $newUrl;
        }
        
        return $url;
    }
}

function bilingual() {
    return BilingualService::getInstance();
}

function t($key) {
    return bilingual()->t($key);
}

function get_current_lang() {
    return bilingual()->getCurrentLang();
}

function is_chinese() {
    return bilingual()->isChinese();
}

function is_english() {
    return bilingual()->isEnglish();
}
