<?php
class PageController extends Controller {
    
    public function about() {
        seo()->setTitle(is_chinese() ? '关于我们' : 'About Us');
        seo()->setDescription(is_chinese() 
            ? '了解邦国崛起服务器的背景故事、开发团队与核心理念。一个由玩家创造、为玩家服务的沉浸式Minecraft国家外交服务器。'
            : 'Learn about the background, team, and vision behind BangGuo Rise - an immersive Minecraft nation diplomacy server created by players, for players.'
        );
        
        $announcements = content()->getAnnouncementList(1, 6);
        $this->view('about', [
            'announcements' => $announcements,
        ]);
    }
    
    public function privacy() {
        seo()->setTitle(is_chinese() ? '隐私政策' : 'Privacy Policy');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器的隐私政策，了解我们如何收集、使用和保护您的个人信息。'
            : 'BangGuo Rise privacy policy - learn how we collect, use, and protect your personal information.'
        );
        $this->view('privacy');
    }
    
    public function terms() {
        seo()->setTitle(is_chinese() ? '服务条款' : 'Terms of Service');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器的服务条款与使用规范，请在使用服务器前仔细阅读。'
            : 'BangGuo Rise terms of service and usage guidelines. Please read carefully before using the server.'
        );
        $this->view('terms');
    }
    
    public function contact() {
        seo()->setTitle(is_chinese() ? '联系我们' : 'Contact Us');
        seo()->setDescription(is_chinese() 
            ? '联系邦国崛起服务器管理团队，获取帮助、提出建议或商务合作。'
            : 'Contact the BangGuo Rise server management team for help, suggestions, or business cooperation.'
        );
        $this->view('contact');
    }
    
    public function copyright() {
        seo()->setTitle(is_chinese() ? '版权声明' : 'Copyright Notice');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器的版权声明与知识产权信息。'
            : 'BangGuo Rise copyright notice and intellectual property information.'
        );
        $this->view('copyright');
    }
    
    public function guide() {
        seo()->setTitle(is_chinese() ? '新手指南' : 'Beginner Guide');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起服务器新手指南，从零开始了解国家外交服务器的玩法、规则与入门技巧。'
            : 'BangGuo Rise beginner guide - learn the gameplay, rules, and tips for starting your journey on the nation diplomacy server.'
        );
        $this->view('guide');
    }
    
    public function fanworks() {
        seo()->setTitle(is_chinese() ? '同人作品' : 'Fan Works');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起玩家社区创作的同人作品展示，包括绘画、小说、音乐等精彩创作。'
            : 'Fan works created by the BangGuo Rise player community, including artwork, stories, music, and more.'
        );
        $this->view('fanworks');
    }
    
    public function creator() {
        seo()->setTitle(is_chinese() ? '创作者中心' : 'Creator Center');
        seo()->setDescription(is_chinese() 
            ? '邦国崛起创作者中心，展示服务器优秀创作者及其作品。'
            : 'BangGuo Rise creator center, showcasing outstanding server creators and their works.'
        );
        $this->view('creator');
    }
    
    public function test() {
        $this->view('test');
    }
    
    public function debug() {
        $this->view('debug');
    }
}