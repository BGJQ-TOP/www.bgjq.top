<?php
class Controller {
    
    protected $request;
    
    public function __construct($request) {
        $this->request = $request;
    }
    
    protected function view($template, $data = []) {
        require_once APP_PATH . '/app/services/BilingualService.php';
        require_once APP_PATH . '/app/services/SeoService.php';

        $bl = bilingual();

        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $lang = $bl->getCurrentLang();

        // 加载 header（输出 SEO 标签和导航栏）
        include VIEW_PATH . '/layouts/header.php';
        
        // 输出页面内容
        include VIEW_PATH . '/pages/' . $template . '.php';

        // 加载 footer
        include VIEW_PATH . '/layouts/footer.php';
    }
    
    protected function json($data) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
    
    protected function back() {
        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/');
    }
}
