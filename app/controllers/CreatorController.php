<?php
class CreatorController extends Controller {
    
    public function show() {
        $id = (int)($this->request->get('id'));
        
        if (!$id) {
            echo "Creator not found";
            return;
        }
        
        $creator = content()->getCreatorById($id);
        
        if (!$creator) {
            http_response_code(404);
            echo "Creator not found";
            return;
        }
        
        $name = is_chinese() ? ($creator['name_zh'] ?? $creator['name']) : ($creator['name_en'] ?? $creator['name']);
        seo()->setTitle($name, false);
        seo()->setDescription(is_chinese() 
            ? ($creator['seo_description_zh'] ?? "了解邦国崛起服务器创作者：{$name}")
            : ($creator['seo_description_en'] ?? "Learn about BangGuo Rise creator: {$name}")
        );
        
        $this->view('creator/show', [
            'creator' => $creator,
        ]);
    }
}