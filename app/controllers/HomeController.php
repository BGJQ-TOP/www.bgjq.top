<?php
class HomeController extends Controller {
    
    public function index() {
        seo()->setTitle(is_chinese() ? '邦国崛起 · 沉浸式 MC 国家外交服务器' : 'BangGuo Rise · Immersive MC Nation Diplomacy Server');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起 (BangGuo Rise) 是全球最大的 Minecraft 国战服务器，提供沉浸式国家外交与战争体验。支持中英双语，全球玩家同服竞技，自由建造王国。'
            : 'BangGuo Rise is the largest Minecraft nation warfare server worldwide. Immersive diplomacy and warfare experience with bilingual support. Build your kingdom, engage in global player competition.'
        );
        
        $announcements = content()->getAnnouncementList(1, 6);
        
        $this->view('home', [
            'announcements' => $announcements,
        ]);
    }
}
