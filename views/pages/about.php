<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('关于我们 - 邦国崛起官方网站 | 全球最大的 MC 国战服务器');
    seo()->setDescription('了解邦国崛起 (BangGuo Rise) - 全球最大的 Minecraft 国战服务器。沉浸式国家外交与战争体验，中英双语支持。服务器 IP: bgjq.simpfun.cn');
    seo()->setKeywords('关于我们，邦国崛起，MC 国战服务器，Minecraft 服务器，国战游戏，多人游戏，中文服务器，全球服务器，游戏社区');
} else {
    seo()->setTitle('About Us - BangGuo Rise Official | World\'s Largest MC Nation Warfare Server');
    seo()->setDescription('Learn about BangGuo Rise - the world\'s largest Minecraft nation warfare server. Immersive nation diplomacy and warfare experience, bilingual support. Server IP: bgjq.simpfun.cn');
    seo()->setKeywords('about us, BangGuo Rise, MC warfare server, Minecraft server, nation warfare, multiplayer game, Chinese server, global server, gaming community');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> <?php echo is_chinese() ? '关于我们' : 'About Us'; ?></h1>
        <p><?php echo is_chinese() ? '了解邦国崛起的故事与愿景' : 'Learn about the story and vision of BangGuo Rise'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="about-content">
            <h2><?php echo is_chinese() ? '关于邦国崛起' : 'About BangGuo Rise'; ?></h2>
            <p><?php echo is_chinese() 
                ? '邦国崛起 (BangGuo Rise) 是全球最大的 MC 国战服务器，致力于为玩家提供沉浸式的国家外交与战争体验。我们创建了一个独特的世界观，支持中英双语，让全球玩家都能享受游戏的乐趣。' 
                : 'BangGuo Rise is the largest MC nation warfare server, dedicated to providing players with immersive nation diplomacy and warfare experience. We have created a unique worldview with bilingual support (Chinese/English), allowing global players to enjoy the game.'; ?>
            </p>

            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-number" id="about-online-players">--</div>
                    <div class="stat-label"><?php echo is_chinese() ? '在线玩家' : 'Online Players'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">493</div>
                    <div class="stat-label"><?php echo is_chinese() ? '注册玩家' : 'Registered Players'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="about-nation-count">--</div>
                    <div class="stat-label"><?php echo is_chinese() ? '活跃邦国' : 'Active Nations'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="about-uptime">--</div>
                    <div class="stat-label"><?php echo is_chinese() ? '开服时长' : 'Uptime'; ?></div>
                </div>
            </div>
            
            <h3><?php echo is_chinese() ? '服务器特色' : 'Server Features'; ?></h3>
            <div class="features-grid">
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    <h4><?php echo is_chinese() ? '全球同服，中英双语' : 'Global Server, Bilingual'; ?></h4>
                    <p><?php echo is_chinese() ? '支持中文和英文，全球玩家无障碍交流' : 'Chinese and English support for global players'; ?></p>
                </div>
                
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path><path d="M13 19l6-6"></path><path d="M16 16l4 4"></path><path d="M19 21l2-2"></path></svg>
                    <h4><?php echo is_chinese() ? '真实国战体验' : 'Real Nation Warfare'; ?></h4>
                    <p><?php echo is_chinese() ? '外交、结盟、宣战、攻城，体验真实的国家战争' : 'Diplomacy, alliances, declarations of war, sieges'; ?></p>
                </div>
                
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg>
                    <h4><?php echo is_chinese() ? '自由城市建设' : 'Free City Building'; ?></h4>
                    <p><?php echo is_chinese() ? '圈地保护，自由建造，打造属于你的城市' : 'Land claiming, free building, create your city'; ?></p>
                </div>
                
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    <h4><?php echo is_chinese() ? '丰富的世界观' : 'Rich Worldview'; ?></h4>
                    <p><?php echo is_chinese() ? '完整的历史背景、国家设定、剧情任务' : 'Complete history, nation settings, story quests'; ?></p>
                </div>
                
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg>
                    <h4><?php echo is_chinese() ? '音乐创作专区' : 'Music Creation'; ?></h4>
                    <p><?php echo is_chinese() ? '展示你的音乐才华，为服务器创作配乐' : 'Showcase your music talent, create soundtracks'; ?></p>
                </div>
                
                <div class="feature-item">
                    <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    <h4><?php echo is_chinese() ? '视频创作专区' : 'Video Creation'; ?></h4>
                    <p><?php echo is_chinese() ? '分享游戏视频，记录精彩瞬间' : 'Share gameplay videos, capture highlights'; ?></p>
                </div>
            </div>
            
            <h3><?php echo is_chinese() ? '我们的愿景' : 'Our Vision'; ?></h3>
            <p><?php echo is_chinese() 
                ? '我们希望打造一个全球领先的 Minecraft 国战服务器，让来自世界各地的玩家能够在这里找到归属感，体验真实的国家外交与战争，发挥自己的创造力，建立属于自己的传奇。无论你是喜欢战斗、建设、创作还是社交，都能在邦国崛起找到属于自己的位置。' 
                : 'We aim to build a world-leading Minecraft nation warfare server where players from around the globe can find belonging, experience real diplomacy and warfare, unleash creativity, and build their own legends. Whether you love combat, building, creation, or socializing, you will find your place in BangGuo Rise.'; ?>
            </p>
            
            <h3><?php echo is_chinese() ? '加入我们' : 'Join Us'; ?></h3>
            <p><?php echo is_chinese() 
                ? '立即加入邦国崛起，与全球玩家一起书写你的传奇！' 
                : 'Join BangGuo Rise now and write your legend with players worldwide!'; ?>
            </p>
            <div class="join-cta">
                <div class="server-ip">
                    <span class="ip-label"><?php echo is_chinese() ? '服务器 IP' : 'Server IP'; ?>:</span>
                    <code>bgjq.simpfun.cn</code>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about-content {
    max-width: 1200px;
    margin: 0 auto;
}

.about-content h2 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-bottom: 4px solid #000;
    padding-bottom: 1rem;
}

.about-content h3 {
    font-size: 1.4rem;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    color: #34495e;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.about-content p {
    margin-bottom: 1.5rem;
    line-height: 2.2;
    color: #666;
}

.about-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.stat-card {
    background: white;
    border: 2px solid #000;
    padding: 2rem;
    text-align: center;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s ease;
}

.stat-card:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #f59e0b;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
}

.stat-label {
    font-size: 0.9rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin: 2.5rem 0;
}

.feature-item {
    background: white;
    border: 2px solid #000;
    padding: 2rem;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s ease;
}

.feature-item:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.feature-item h4 {
    font-size: 1.1rem;
    margin: 1rem 0 0.8rem;
    color: #2c3e50;
    text-transform: uppercase;
}

.feature-item p {
    color: #666;
    line-height: 2;
    margin-bottom: 0;
}

.join-cta {
    text-align: center;
    padding: 2.5rem;
    background: var(--primary);
    border: 4px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    margin-top: 3rem;
}

.server-ip {
    font-size: 1.3rem;
    color: var(--dark) !important;
}

.ip-label {
    color: var(--dark) !important;
    margin-right: 1rem;
}

.server-ip code {
    background: white;
    color: var(--dark);
    padding: 0.5rem 1rem;
    border: 2px solid #000;
    font-family: 'Courier New', monospace;
    font-weight: bold;
    margin: 0 0.5rem;
}

.ip-separator {
    color: var(--dark);
    margin: 0 0.5rem;
}
</style>

<script>
// 动态获取服务器状态数据，与主页保持一致
document.addEventListener('DOMContentLoaded', function() {
    // 从API获取服务器状态
    fetch('/api/server-status')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // 更新在线玩家数
                const onlinePlayers = data.data.online_players || '--';
                const onlineEl = document.getElementById('about-online-players');
                if (onlineEl) onlineEl.textContent = onlinePlayers;

                // 更新邦国数量
                const nationCount = data.data.nation_count || '--';
                const nationEl = document.getElementById('about-nation-count');
                if (nationEl) nationEl.textContent = nationCount;

                // 更新开服时长
                const uptime = data.data.uptime || '--';
                const uptimeEl = document.getElementById('about-uptime');
                if (uptimeEl) uptimeEl.textContent = uptime;
            }
        })
        .catch(error => {
            console.log('Server status fetch failed:', error);
        });
});
</script>
