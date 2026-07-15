<?php
return [
    'seo' => [
        'default' => [
            'zh' => [
                'title' => '邦国崛起 · 沉浸式 MC 国家外交服务器',
                'description' => '邦国崛起 (BangGuo Rise) 是全球最大的 Minecraft 国战服务器，提供沉浸式国家外交与战争体验。支持中英双语，全球玩家同服竞技，自由建造王国。完善的外交系统、领土争夺、城市建设玩法。服务器 IP: bgjq.simpfun.cn',
                'keywords' => '邦国崛起，MC 服务器，我的世界国战，MC 国战服务器，BangGuo Rise,Minecraft 服务器，国战游戏，外交系统，城市建设，多人游戏',
            ],
            'en' => [
                'title' => 'BangGuo Rise · Immersive MC Nation Diplomacy Server',
                'description' => 'BangGuo Rise is the largest Minecraft nation warfare server worldwide. Immersive diplomacy and warfare experience with bilingual support. Build your kingdom, engage in global player competition. Complete diplomacy system, territory control, city building. Server IP: bgjq.simpfun.cn',
                'keywords' => 'BangGuo Rise,MC server,Minecraft nation wars,Minecraft server,nation warfare,diplomacy server,city building,multiplayer game,global server',
            ],
        ],
        
        'title_suffix' => [
            'zh' => ' - 邦国崛起官方网站',
            'en' => ' - BangGuo Rise Official Website',
        ],
        
        'robots' => [
            'allow' => true,
            'sitemap' => '/sitemap.xml',
        ],
        
        'indexnow' => [
            'enabled' => true,
            'api_key' => getenv('INDEXNOW_API_KEY') ?: '',
            'endpoints' => [
                'https://api.indexnow.org/IndexNow',
                'https://www.bing.com/indexnow',
            ],
        ],
        
        'hreflang' => [
            'default' => 'zh-CN',
            'alternates' => ['en'],
        ],
    ],
];
