<?php
seo()->setTitle((is_chinese() ? '邦国崛起 · 沉浸式 MC 国家外交服务器 · 全球顶级国战体验' : 'BangGuo Rise · Immersive MC Nation Diplomacy Server · Top Global Warfare Experience'));
seo()->setDescription(is_chinese()
    ? '邦国崛起，全球最大的 Minecraft 国战服务器，提供沉浸式国家外交与战争体验。支持中英双语，全球玩家同服竞技，自由建造你的王国。服务器 IP: bgjq.simpfun.cn'
    : 'The largest Minecraft nation warfare server with immersive diplomacy and warfare. Bilingual support, global players. Server IP: bgjq.simpfun.cn');
seo()->setKeywords(is_chinese()
    ? 'Minecraft 服务器，MC 国战，邦国崛起，国家外交服务器，Minecraft 战争，MC 服务器，国战游戏，我的世界服务器'
    : 'Minecraft server, nation warfare, BangGuo Rise, diplomacy server, MC war, nation building, Minecraft PvP');
?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "GameServer",
    "name": "<?php echo t('site_name'); ?>",
    "description": "<?php echo t('home_description'); ?>",
    "url": "https://www.bgjq.top",
    "game": {
        "@type": "VideoGame",
        "name": "Minecraft",
        "genre": "Sandbox",
        "platform": "PC"
    },
    "serverStatus": "online",
    "playerCount": "--",
    "serverAddress": "bgjq.simpfun.cn"
}
</script>

<section class="hero-section">
    <div class="container">
        <div class="hero-badge">
            <span class="pulse"></span>
            <?php echo is_chinese() ? '全球顶级 MC 国战服务器' : 'Top Global MC Nation Warfare Server'; ?>
        </div>
        
        <h1 class="hero-title">
            <?php echo is_chinese() ? '邦国<span class="highlight">崛起</span>' : 'BangGuo<span class="highlight"> Rise</span>'; ?>
        </h1>
        
        <p class="hero-subtitle">
            <?php echo is_chinese() 
                ? '沉浸式MC国家外交服务器 · 真实国战体验 · 全球玩家同服竞技' 
                : 'Immersive MC Nation Diplomacy Server · Real Warfare · Global Players'; ?>
        </p>
        
        <div class="hero-stats">
            <div class="hero-stat">
                <span class="hero-stat-value" id="hero-online-players">--</span>
                <span class="hero-stat-label"><?php echo is_chinese() ? '在线玩家' : 'Online Players'; ?></span>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-value">493</span>
                <span class="hero-stat-label"><?php echo is_chinese() ? '注册玩家' : 'Registered Players'; ?></span>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-value" id="hero-nation-count">--</span>
                <span class="hero-stat-label"><?php echo is_chinese() ? '活跃邦国' : 'Active Nations'; ?></span>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-value" id="hero-uptime">--</span>
                <span class="hero-stat-label"><?php echo is_chinese() ? '开服时长' : 'Uptime'; ?></span>
            </div>
        </div>
        
        <div class="hero-buttons" id="join">
            <button class="btn btn-primary btn-large copy-ip-btn" type="button" data-ip="bgjq.simpfun.cn" aria-label="<?php echo is_chinese() ? '复制服务器地址 bgjq.simpfun.cn' : 'Copy server address bgjq.simpfun.cn'; ?>">
                <span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></span>
                <span><?php echo is_chinese() ? '复制服务器IP' : 'Copy Server IP'; ?></span>
                <small class="ip-hint">bgjq.simpfun.cn</small>
            </button>
            <a href="https://file.bgjq.top" target="_blank" class="btn btn-secondary btn-large">
                <span class="btn-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></span>
                <span><?php echo is_chinese() ? '下载客户端 (1.21.4)' : 'Download Client (1.21.4)'; ?></span>
            </a>
            <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank" class="btn btn-secondary btn-large">
                <span class="btn-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></span>
                <span><?php echo is_chinese() ? '加入官方QQ群' : 'Join QQ Group'; ?></span>
            </a>
        </div>
    </div>
</section>

<section class="server-status-section">
    <div class="container">
        <div class="status-cards">
            <div class="status-card">
                <div class="status-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6" fill="currentColor"></circle></svg></div>
                <div class="status-info">
                    <span class="status-label"><?php echo is_chinese() ? '服务器状态' : 'Server Status'; ?></span>
                    <span class="status-value online" id="server-status"><?php echo is_chinese() ? '在线' : 'Online'; ?></span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
                <div class="status-info">
                    <span class="status-label"><?php echo is_chinese() ? '当前在线' : 'Players Online'; ?></span>
                    <span class="status-value" id="online-players">--</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
                <div class="status-info">
                    <span class="status-label"><?php echo is_chinese() ? '开服时长' : 'Uptime'; ?></span>
                    <span class="status-value" id="server-uptime">--</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></div>
                <div class="status-info">
                    <span class="status-label"><?php echo is_chinese() ? 'TPS' : 'Server TPS'; ?></span>
                    <span class="status-value">20.0</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '为什么选择邦国崛起？' : 'Why BangGuo Rise?'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '真实还原国家外交与战争，打造沉浸式MC国战体验' : 'Realistic nation diplomacy and warfare, immersive MC experience'; ?></p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg></div>
                <h3><?php echo is_chinese() ? '全球同服' : 'Global Server'; ?></h3>
                <p><?php echo is_chinese() ? '支持全球玩家共同游戏，中英双语支持，打破地域限制' : 'Play with players worldwide, bilingual support, no borders'; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path><path d="M13 19l6-6"></path><path d="M16 16l4 4"></path><path d="M19 21l2-2"></path></svg></div>
                <h3><?php echo is_chinese() ? '真实国战' : 'Real Warfare'; ?></h3>
                <p><?php echo is_chinese() ? '完善的外交系统、战争机制、领土争夺，体验真实国家博弈' : 'Complete diplomacy, warfare, territory systems'; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg></div>
                <h3><?php echo is_chinese() ? '城市建设' : 'City Building'; ?></h3>
                <p><?php echo is_chinese() ? '自由建造你的王国，从村庄到帝国，打造独一无二的国家' : 'Build your kingdom freely, from village to empire'; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg></div>
                <h3><?php echo is_chinese() ? '史诗剧情' : 'Epic Lore'; ?></h3>
                <p><?php echo is_chinese() ? '丰富的世界观与历史剧情，每个邦国都有自己的故事' : 'Rich worldview and history, every nation has its story'; ?></p>
            </div>
        </div>
    </div>
</section>

<section class="content-section alt">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '多元化游戏体验' : 'Diverse Gameplay'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '8大核心玩法，满足不同类型玩家需求' : '8 core game modes for all player types'; ?></p>
        </div>
        
        <div class="modes-grid">
            <div class="mode-card">
                <div class="mode-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path><path d="M13 19l6-6"></path><path d="M16 16l4 4"></path><path d="M19 21l2-2"></path></svg></div>
                <div class="mode-content">
                    <span class="mode-tag"><?php echo is_chinese() ? '核心玩法' : 'Core'; ?></span>
                    <h3><?php echo is_chinese() ? '国家战争' : 'Nation Wars'; ?></h3>
                    <p><?php echo is_chinese() ? '组建军队，制定战略，与其他邦国展开激烈的领土争夺战。' : 'Build armies, strategize, fight for territory with other nations.'; ?></p>
                    <div class="mode-features">
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '宣战系统' : 'War Declaration'; ?></span>
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '领土争夺' : 'Territory Control'; ?></span>
                    </div>
                </div>
            </div>
            <div class="mode-card">
                <div class="mode-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg></div>
                <div class="mode-content">
                    <span class="mode-tag"><?php echo is_chinese() ? '外交系统' : 'Diplomacy'; ?></span>
                    <h3><?php echo is_chinese() ? '外交联盟' : 'Alliances'; ?></h3>
                    <p><?php echo is_chinese() ? '建立外交关系，签署条约，组建联盟，共同对抗强敌。' : 'Build diplomatic relations, sign treaties, form alliances.'; ?></p>
                    <div class="mode-features">
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '条约系统' : 'Treaties'; ?></span>
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '联盟管理' : 'Alliance Mgmt'; ?></span>
                    </div>
                </div>
            </div>
            <div class="mode-card">
                <div class="mode-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg></div>
                <div class="mode-content">
                    <span class="mode-tag"><?php echo is_chinese() ? '建设玩法' : 'Building'; ?></span>
                    <h3><?php echo is_chinese() ? '城市建设' : 'City Building'; ?></h3>
                    <p><?php echo is_chinese() ? '规划城市布局，建造宏伟建筑，发展经济基础设施。' : 'Plan city layouts, build grand structures, develop economy.'; ?></p>
                    <div class="mode-features">
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '自由建造' : 'Free Build'; ?></span>
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '经济系统' : 'Economy'; ?></span>
                    </div>
                </div>
            </div>
            <div class="mode-card">
                <div class="mode-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg></div>
                <div class="mode-content">
                    <span class="mode-tag"><?php echo is_chinese() ? '生存玩法' : 'Survival'; ?></span>
                    <h3><?php echo is_chinese() ? '资源采集' : 'Resource Gathering'; ?></h3>
                    <p><?php echo is_chinese() ? '探索世界，采集资源，发展科技，支撑国家发展。' : 'Explore, gather resources, develop tech for your nation.'; ?></p>
                    <div class="mode-features">
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '自定义合成' : 'Custom Crafting'; ?></span>
                        <span class="mode-feature"><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php echo is_chinese() ? '科技树' : 'Tech Tree'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- IP Worldview Section -->
<section class="content-section">
    <div class="container">
        <div class="worldview-card">
            <h2 class="section-title"><?php echo is_chinese() ? '探索邦国崛起的史诗世界' : 'Explore the Epic World'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '完整的世界观体系，丰富的历史剧情，每个邦国都有独特的故事' : 'Complete worldview, rich history, every nation has a unique story'; ?></p>
            
            <a href="/worldview?lang=<?php echo $lang; ?>" class="btn btn-primary btn-large">
                <?php echo is_chinese() ? '探索世界观' : 'Explore Worldview'; ?> →
            </a>
        </div>
    </div>
</section>

<!-- Content Hub Section -->
<section class="content-section alt">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '创作者内容平台' : 'Creator Content Platform'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '音乐、视频、同人作品，全球玩家共创IP内容生态' : 'Music, videos, fan works - global players create together'; ?></p>
        </div>
        
        <div class="hub-grid">
            <div class="hub-card">
                <div class="hub-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg></div>
                <div class="hub-content">
                    <h3><?php echo is_chinese() ? '音乐创作' : 'Music'; ?></h3>
                    <p><?php echo is_chinese() ? '原创主题曲、同人音乐、BGM配乐，打造邦国崛起专属音乐库' : 'Original themes, fan music, BGM - build our music library'; ?></p>
                </div>
            </div>
            <div class="hub-card">
                <div class="hub-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>
                <div class="hub-content">
                    <h3><?php echo is_chinese() ? '视频专区' : 'Videos'; ?></h3>
                    <p><?php echo is_chinese() ? '宣传片、战争实况、建筑展示、教程攻略，精彩视频汇聚' : 'Trailers, war reports, builds, tutorials - all in one place'; ?></p>
                </div>
            </div>
            <div class="hub-card">
                <div class="hub-image"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg></div>
                <div class="hub-content">
                    <h3><?php echo is_chinese() ? '同人创作' : 'Fan Works'; ?></h3>
                    <p><?php echo is_chinese() ? '绘画、小说、图文攻略，玩家创意作品展示平台' : 'Art, stories, guides - showcase your creative works'; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nations Showcase Section -->
<section class="content-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '活跃邦国' : 'Active Nations'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '加入心仪的邦国，或者创建属于自己的国家' : 'Join a nation or create your own kingdom'; ?></p>
        </div>
        
        <div class="nations-grid" id="country-list" aria-live="polite" aria-busy="true">
            <!-- 骨架屏加载状态 -->
            <div class="nation-card skeleton-card">
                <div class="nation-banner skeleton"></div>
                <div class="nation-flag skeleton"></div>
                <div class="nation-content">
                    <h4 class="skeleton-text"><?php echo is_chinese() ? '加载中...' : 'Loading...'; ?></h4>
                    <div class="nation-stats">
                        <span class="skeleton-text"><?php echo is_chinese() ? '邦国' : 'Nation'; ?></span>
                    </div>
                </div>
            </div>
            <div class="nation-card skeleton-card">
                <div class="nation-banner skeleton"></div>
                <div class="nation-flag skeleton"></div>
                <div class="nation-content">
                    <h4 class="skeleton-text"><?php echo is_chinese() ? '加载中...' : 'Loading...'; ?></h4>
                    <div class="nation-stats">
                        <span class="skeleton-text"><?php echo is_chinese() ? '邦国' : 'Nation'; ?></span>
                    </div>
                </div>
            </div>
            <div class="nation-card skeleton-card">
                <div class="nation-banner skeleton"></div>
                <div class="nation-flag skeleton"></div>
                <div class="nation-content">
                    <h4 class="skeleton-text"><?php echo is_chinese() ? '加载中...' : 'Loading...'; ?></h4>
                    <div class="nation-stats">
                        <span class="skeleton-text"><?php echo is_chinese() ? '邦国' : 'Nation'; ?></span>
                    </div>
                </div>
            </div>
            <div class="nation-card skeleton-card">
                <div class="nation-banner skeleton"></div>
                <div class="nation-flag skeleton"></div>
                <div class="nation-content">
                    <h4 class="skeleton-text"><?php echo is_chinese() ? '加载中...' : 'Loading...'; ?></h4>
                    <div class="nation-stats">
                        <span class="skeleton-text"><?php echo is_chinese() ? '邦国' : 'Nation'; ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="text-align:center;margin-top:40px;">
            <a href="/nations?lang=<?php echo $lang; ?>" class="btn btn-secondary btn-large">
                <?php echo is_chinese() ? '查看全部邦国' : 'View All Nations'; ?> →
            </a>
        </div>
    </div>
</section>

<!-- Quick Start Guide Section -->
<section class="content-section alt">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '快速开始游戏' : 'Get Started Quickly'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '4 步轻松加入邦国崛起的世界' : '4 easy steps to join BangGuo Rise'; ?></p>
        </div>
        
        <div class="guide-steps">
            <div class="guide-step">
                <div class="guide-step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></div>
                <h4><?php echo is_chinese() ? '下载游戏' : 'Download Game'; ?></h4>
                <p><?php echo is_chinese() ? '下载并安装Minecraft Java版 1.21.4' : 'Download and install Minecraft Java 1.21.4'; ?></p>
            </div>
            <div class="guide-step">
                <div class="guide-step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></div>
                <h4><?php echo is_chinese() ? '复制IP' : 'Copy IP'; ?></h4>
                <p><?php echo is_chinese() ? '复制服务器地址 bgjq.simpfun.cn' : 'Copy server address: bgjq.simpfun.cn'; ?></p>
            </div>
            <div class="guide-step">
                <div class="guide-step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="6" y1="12" x2="10" y2="12"></line><line x1="8" y1="10" x2="8" y2="14"></line><line x1="15" y1="13" x2="15.01" y2="13"></line><line x1="18" y1="11" x2="18.01" y2="11"></line><rect x="2" y="6" width="20" height="12" rx="2"></rect></svg></div>
                <h4><?php echo is_chinese() ? '加入服务器' : 'Join Server'; ?></h4>
                <p><?php echo is_chinese() ? '在多人游戏中添加服务器并连接' : 'Add server in multiplayer and connect'; ?></p>
            </div>
            <div class="guide-step">
                <div class="guide-step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg></div>
                <h4><?php echo is_chinese() ? '选择邦国' : 'Choose Nation'; ?></h4>
                <p><?php echo is_chinese() ? '选择或创建属于你的邦国' : 'Choose or create your nation'; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<?php if (!empty($announcements)): ?>
<section class="content-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo is_chinese() ? '官方公告' : 'Announcements'; ?></h2>
            <p class="section-desc"><?php echo is_chinese() ? '了解服务器最新更新与活动' : 'Stay updated with server news and events'; ?></p>
        </div>
        
        <div class="news-grid">
            <?php foreach (array_slice($announcements, 0, 3) as $ann): ?>
            <article class="news-card" itemscope itemtype="https://schema.org/Article">
                <div class="news-image"></div>
                <div class="news-content">
                    <meta itemprop="datePublished" content="<?php echo $ann['publish_time']; ?>">
                    <meta itemprop="author" content="<?php echo t('site_name'); ?>">
                    <div class="news-meta">
                        <span class="news-tag"><?php echo is_chinese() ? '公告' : 'News'; ?></span>
                        <span><?php echo date('Y-m-d', strtotime($ann['publish_time'])); ?></span>
                    </div>
                    <h3 itemprop="headline">
                        <a href="/announcements/<?php echo $ann['id']; ?>?lang=<?php echo $lang; ?>" itemprop="url">
                            <?php echo bilingual()->getTitle($ann); ?>
                        </a>
                    </h3>
                    <p itemprop="description"><?php echo mb_substr(strip_tags(bilingual()->getContent($ann)), 0, 80); ?>...</p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        
        <div style="text-align:center;margin-top:40px;">
            <a href="/announcements?lang=<?php echo $lang; ?>" class="btn btn-secondary btn-large">
                <?php echo is_chinese() ? '查看全部公告' : 'View All News'; ?> →
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section" id="download">
    <div class="container">
        <h2><?php echo is_chinese() ? '准备好开启你的征程了吗？' : 'Ready to Start Your Journey?'; ?></h2>
        <p><?php echo is_chinese() ? '立即加入全球最大的MC国战服务器，书写属于你的传奇' : 'Join the largest MC nation warfare server, write your legend'; ?></p>
        <div class="hero-buttons">
            <button class="btn btn-primary btn-large copy-ip-btn" type="button" data-ip="bgjq.simpfun.cn" aria-label="<?php echo is_chinese() ? '复制服务器地址 bgjq.simpfun.cn' : 'Copy server address bgjq.simpfun.cn'; ?>">
                <span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></span>
                <span><?php echo is_chinese() ? '复制服务器IP' : 'Copy Server IP'; ?></span>
            </button>
            <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank" class="btn btn-secondary btn-large">
                <span class="btn-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></span>
                <span><?php echo is_chinese() ? '加入玩家社群' : 'Join Community'; ?></span>
            </a>
        </div>
    </div>
</section>