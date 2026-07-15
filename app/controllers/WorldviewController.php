<?php
class WorldviewController extends Controller {
    
    public function index() {
        $type = $this->request->get('type');
        $page = (int)($this->request->get('page', 1));
        
        $list = content()->getWorldviewList($page, 20, 1, $type);
        
        $lang = get_current_lang();
        if ($type) {
            $typeTitles = [
                'story' => ['zh' => '故事', 'en' => 'Story'],
                'chronicle' => ['zh' => '编年史', 'en' => 'Chronicle'],
                'nation' => ['zh' => '国家', 'en' => 'Nation'],
                'term' => ['zh' => '术语', 'en' => 'Term'],
            ];
            $title = $typeTitles[$type][$lang] ?? '世界观';
            seo()->setTitle($title);
            seo()->setDescription(is_chinese() 
                ? "{$title} - 邦国崛起服务器史书·国别体"
                : "{$title} - BangGuo Rise Server Archives"
            );
        } else {
            seo()->setTitle(is_chinese() ? '世界观' : 'Worldview');
            seo()->setDescription(is_chinese() 
                ? '探索邦国崛起服务器的宏大世界观，了解编年史、术语库与官方剧情设定。'
                : 'Explore the grand worldview of BangGuo Rise server - chronicles, terminology, and official lore.'
            );
        }
        
        $this->view('worldview/index', [
            'list' => $list,
            'type' => $type,
            'page' => $page,
        ]);
    }
    
    public function show() {
        $id = (int)($this->request->get('id'));
        
        if (!$id) {
            $this->redirect('/worldview');
        }
        
        $content = content()->getWorldviewById($id);
        
        if (!$content) {
            http_response_code(404);
            echo "Content not found";
            return;
        }
        
        // 应用 SEO 优化
        seo()->setWorldviewSeo($content);
        
        content()->incrementViewCount('bgjq_worldview', $id);
        
        $this->view('worldview/show', [
            'content' => $content,
        ]);
    }
}
