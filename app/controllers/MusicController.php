<?php
class MusicController extends Controller {
    
    public function index() {
        seo()->setTitle(is_chinese() ? '音乐专区' : 'Music');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器音乐专区，聆听玩家创作与推荐的精彩音乐作品。'
            : 'BangGuo Rise music zone - listen to amazing music created and recommended by players.'
        );
        
        $page = (int)($this->request->get('page', 1));
        $list = content()->getMusicList($page, 20);
        
        $this->view('music/index', [
            'list' => $list,
            'page' => $page,
        ]);
    }
    
    public function show() {
        $id = (int)($this->request->get('id'));
        
        if (!$id) {
            $this->redirect('/music');
        }
        
        $music = content()->getMusicById($id);
        
        if (!$music) {
            http_response_code(404);
            echo "Music not found";
            return;
        }
        
        content()->incrementViewCount('bgjq_music', $id);
        
        $title = is_chinese() ? ($music['title_zh'] ?? $music['title']) : ($music['title_en'] ?? $music['title']);
        seo()->setTitle($title, false);
        seo()->setDescription(is_chinese() 
            ? ($music['seo_description_zh'] ?? "欣赏邦国崛起服务器音乐作品：{$title}")
            : ($music['seo_description_en'] ?? "Listen to {$title} - a music piece from BangGuo Rise server")
        );
        
        $this->view('music/show', [
            'music' => $music,
        ]);
    }
}