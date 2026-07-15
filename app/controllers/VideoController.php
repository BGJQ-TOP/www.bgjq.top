<?php
class VideoController extends Controller {
    
    public function index() {
        seo()->setTitle(is_chinese() ? '视频专区' : 'Videos');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器视频专区，观看玩家创作与推荐的精彩视频内容。'
            : 'BangGuo Rise video zone - watch amazing videos created and recommended by players.'
        );
        
        $page = (int)($this->request->get('page', 1));
        $list = content()->getVideoList($page, 20);
        
        $this->view('video/index', [
            'list' => $list,
            'page' => $page,
        ]);
    }
    
    public function show() {
        $id = (int)($this->request->get('id'));
        
        if (!$id) {
            $this->redirect('/video');
        }
        
        $video = content()->getVideoById($id);
        
        if (!$video) {
            http_response_code(404);
            echo "Video not found";
            return;
        }
        
        content()->incrementViewCount('bgjq_video', $id);
        
        $title = is_chinese() ? ($video['title_zh'] ?? $video['title']) : ($video['title_en'] ?? $video['title']);
        seo()->setTitle($title, false);
        seo()->setDescription(is_chinese() 
            ? ($video['seo_description_zh'] ?? "观看邦国崛起服务器视频：{$title}")
            : ($video['seo_description_en'] ?? "Watch {$title} - a video from BangGuo Rise server")
        );
        
        $this->view('video/show', [
            'video' => $video,
        ]);
    }
}