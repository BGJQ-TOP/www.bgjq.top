<?php
class SeoService {
    
    private static $instance = null;
    private $config = null;
    private $meta = [];
    private $title = '';
    
    private function __construct() {
        $this->config = Config::getInstance();
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function setTitle($title, $append = true) {
        $lang = get_current_lang();
        $suffix = $this->config->get("seo.title_suffix.{$lang}", '');
        
        if ($append) {
            $this->title = $title . $suffix;
        } else {
            $this->title = $title;
        }
        
        return $this;
    }
    
    public function getTitle() {
        if (empty($this->title)) {
            $lang = get_current_lang();
            $defaultTitle = $this->config->get("seo.default.{$lang}.title", '');
            return $defaultTitle;
        }
        
        return $this->title;
    }
    
    public function setDescription($description) {
        $this->meta['description'] = $this->validateDescription($description);
        return $this;
    }
    
    public function getDescription() {
        if (isset($this->meta['description'])) {
            return $this->meta['description'];
        }
        
        $lang = get_current_lang();
        $defaultDesc = $this->config->get("seo.default.{$lang}.description", '');
        return $this->validateDescription($defaultDesc);
    }
    
    private function validateDescription($description) {
        if (empty($description)) {
            return '';
        }
        
        $length = mb_strlen($description);
        $minLength = 25;
        $maxLength = 160;
        
        if ($length > $maxLength) {
            $truncated = mb_substr($description, 0, $maxLength - 3);
            $lastSpace = mb_strrpos($truncated, ' ');
            if ($lastSpace !== false && $lastSpace > $minLength) {
                $truncated = mb_substr($truncated, 0, $lastSpace);
            }
            return rtrim($truncated);
        }
        
        if ($length < $minLength) {
            return $description . ' ' . t('site_name');
        }
        
        return $description;
    }
    
    public function setKeywords($keywords) {
        $this->meta['keywords'] = $keywords;
        return $this;
    }
    
    public function setWorldviewSeo($worldviewData) {
        $lang = get_current_lang();
        
        if ($lang === 'zh') {
            $this->setTitle($worldviewData['title_zh'], false);
            $this->setDescription($worldviewData['seo_description_zh']);
            $this->setKeywords($worldviewData['seo_keywords_zh']);
        } else {
            $this->setTitle($worldviewData['title_en'], false);
            $this->setDescription($worldviewData['seo_description_en']);
            $this->setKeywords($worldviewData['seo_keywords_en']);
        }
        
        return $this;
    }
    
    public function getKeywords() {
        if (isset($this->meta['keywords'])) {
            return $this->meta['keywords'];
        }
        
        $lang = get_current_lang();
        return $this->config->get("seo.default.{$lang}.keywords", '');
    }
    
    public function setMeta($key, $value) {
        $this->meta[$key] = $value;
        return $this;
    }
    
    public function getMeta($key) {
        return $this->meta[$key] ?? '';
    }
    
    public function renderMetaTags() {
        $output = '';
        
        // 基础标签
        $output .= '<title>' . $this->getTitle() . '</title>' . "\n";
        $output .= '<meta name="description" content="' . $this->getDescription() . '">' . "\n";
        $output .= '<meta name="keywords" content="' . $this->getKeywords() . '">' . "\n";
        
        // 技术标签
        $output .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n";
        $output .= '<meta name="theme-color" content="#f59e0b">' . "\n";
        
        // 移动设备标签
        $output .= '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
        $output .= '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">' . "\n";
        
        // Robots标签
        $robots = $this->config->get('seo.robots.allow', true) ? 'index, follow' : 'noindex, nofollow';
        $output .= '<meta name="robots" content="' . $robots . '">' . "\n";
        
        // 自定义标签
        foreach ($this->meta as $key => $value) {
            if (!in_array($key, ['description', 'keywords'])) {
                $output .= '<meta name="' . $key . '" content="' . $value . '">' . "\n";
            }
        }
        
        return $output;
    }
    
    public function renderHreflangTags() {
        $currentUrl = 'https://www.bgjq.top' . $_SERVER['REQUEST_URI'];
        $parsed = parse_url($currentUrl);
        $baseUrl = 'https://www.bgjq.top' . $parsed['path'];
        
        $lang = get_current_lang();
        parse_str($parsed['query'] ?? '', $query);
        
        $zhUrl = $baseUrl . '?' . http_build_query(array_merge($query, ['lang' => 'zh']));
        $enUrl = $baseUrl . '?' . http_build_query(array_merge($query, ['lang' => 'en']));
        
        $canonicalUrl = ($lang === 'en') ? $enUrl : $zhUrl;
        
        $output = '';
        
        $output .= '<link rel="canonical" href="' . $canonicalUrl . '">' . "\n";
        
        $output .= '<link rel="alternate" hreflang="zh-CN" href="' . $zhUrl . '">' . "\n";
        $output .= '<link rel="alternate" hreflang="en" href="' . $enUrl . '">' . "\n";
        
        return $output;
    }
    
    public function renderOpenGraph() {
        $output = '';
        
        $output .= '<meta property="og:title" content="' . $this->getTitle() . '">' . "\n";
        $output .= '<meta property="og:description" content="' . $this->getDescription() . '">' . "\n";
        $output .= '<meta property="og:url" content="https://www.bgjq.top' . $_SERVER['REQUEST_URI'] . '">' . "\n";
        $output .= '<meta property="og:type" content="website">' . "\n";
        $output .= '<meta property="og:site_name" content="' . t('site_name') . '">' . "\n";
        $output .= '<meta property="og:image" content="https://www.bgjq.top/public/images/BGJQ.webp">' . "\n";
        $output .= '<meta property="og:image:width" content="1200">' . "\n";
        $output .= '<meta property="og:image:height" content="630">' . "\n";
        $output .= '<meta property="og:image:alt" content="' . t('site_name') . ' Logo">' . "\n";
        
        return $output;
    }
    
    public function renderTwitterCard() {
        $output = '';
        
        $output .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
        $output .= '<meta name="twitter:title" content="' . $this->getTitle() . '">' . "\n";
        $output .= '<meta name="twitter:description" content="' . $this->getDescription() . '">' . "\n";
        $output .= '<meta name="twitter:image" content="https://www.bgjq.top/public/images/BGJQ.webp">' . "\n";
        $output .= '<meta name="twitter:image:alt" content="' . t('site_name') . ' Logo">' . "\n";
        $output .= '<meta name="twitter:site" content="@bgjq_top">' . "\n";
        
        return $output;
    }
    
    public function renderAll() {
        $output = '';
        
        $output .= $this->renderMetaTags();
        $output .= $this->renderHreflangTags();
        $output .= $this->renderOpenGraph();
        $output .= $this->renderTwitterCard();
        
        return $output;
    }
    
    public function reset() {
        $this->meta = [];
        $this->title = '';
    }
}

function seo() {
    return SeoService::getInstance();
}
