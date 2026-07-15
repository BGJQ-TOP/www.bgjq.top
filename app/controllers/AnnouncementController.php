<?php
class AnnouncementController extends Controller {
    
    public function index() {
        seo()->setTitle(is_chinese() ? '最新公告' : 'Latest Announcements');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器最新公告与新闻动态，了解服务器更新、活动与重要通知。'
            : 'Latest announcements and news from BangGuo Rise server. Stay updated on server updates, events, and important notices.'
        );
        
        $page = (int)($this->request->get('page', 1));
        $list = content()->getAnnouncementList($page, 10);
        
        $this->view('announcements/index', [
            'list' => $list,
            'page' => $page,
        ]);
    }
    
    public function show() {
        $id = (int)($this->request->get('id'));
        
        if (!$id) {
            $this->redirect('/announcements');
        }
        
        $announcement = content()->getAnnouncementById($id);
        
        if (!$announcement) {
            http_response_code(404);
            echo "Announcement not found";
            return;
        }
        
        content()->incrementViewCount('bgjq_announcements', $id);
        
        $title = is_chinese() ? ($announcement['title_zh'] ?? $announcement['title']) : ($announcement['title_en'] ?? $announcement['title']);
        seo()->setTitle($title, false);
        seo()->setDescription(is_chinese() 
            ? ($announcement['seo_description_zh'] ?? mb_substr(strip_tags($announcement['content_zh'] ?? ''), 0, 150))
            : ($announcement['seo_description_en'] ?? mb_substr(strip_tags($announcement['content_en'] ?? ''), 0, 150))
        );
        
        $this->view('announcements/show', [
            'announcement' => $announcement,
        ]);
    }
}