<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('同人作品 - 邦国崛起玩家创作展示 | 建筑艺术音乐视频');
    seo()->setDescription('欣赏邦国崛起玩家的精彩同人作品！包括宏伟建筑、精致艺术、动人音乐、精彩视频等创作展示。展示你的才华，与全球玩家分享你的 MC 创作！服务器 IP: bgjq.simpfun.cn');
    seo()->setKeywords('同人作品，玩家创作，建筑展示，艺术作品，音乐创作，视频制作，MC 创作，Minecraft 艺术，邦国崛起社区，游戏视频');
} else {
    seo()->setTitle('Fan Works - BangGuo Rise Player Creations Showcase | Build Art Music Video');
    seo()->setDescription('Explore amazing fan works from BangGuo Rise players! Including magnificent builds, exquisite art, music, videos and more. Showcase your talent and share your MC creations with players worldwide! Server IP: bgjq.simpfun.cn');
    seo()->setKeywords('fan works, player creations, build showcase, artwork, music creation, video production, MC creations, Minecraft art, BangGuo Rise community, game video');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg> <?php echo is_chinese() ? '同人作品' : 'Fan Works'; ?></h1>
        <p><?php echo is_chinese() ? '展示创意才华，分享你的邦国崛起创作！' : 'Showcase your creativity and share your BangGuo Rise creations!'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="fanworks-content">
            <?php if (is_chinese()): ?>
            <h2>玩家创作展示平台</h2>
            <p>这里展示的是邦国崛起玩家的精彩创作作品。无论是宏伟的建筑、精美的艺术、动人的音乐还是精彩的视频，都可以在这里分享和欣赏。</p>
            
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">🏛️</div>
                    <h3>建筑作品</h3>
                    <p>展示玩家精心设计的宏伟建筑，从古典城堡到现代都市，每一座建筑都是艺术的结晶。</p>
                    <a href="/video?lang=zh" class="category-link">查看建筑视频 →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎨</div>
                    <h3>艺术作品</h3>
                    <p>玩家绘制的插画、像素画、概念设计等视觉艺术作品，展现邦国崛起的世界观。</p>
                    <a href="/announcements?lang=zh" class="category-link">查看艺术展示 →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎵</div>
                    <h3>音乐创作</h3>
                    <p>玩家原创或改编的音乐作品，包括游戏配乐、主题曲、角色歌等。</p>
                    <a href="/music?lang=zh" class="category-link">进入音乐专区 →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎬</div>
                    <h3>视频作品</h3>
                    <p>精彩的游戏录像、建筑延时、剧情短片、PVP 集锦等视频内容。</p>
                    <a href="/video?lang=zh" class="category-link">进入视频专区 →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">📝</div>
                    <h3>文学创作</h3>
                    <p>基于邦国崛起世界观的小说、诗歌、故事等文学作品。</p>
                    <a href="/worldview?lang=zh" class="category-link">了解世界观 →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🗺️</div>
                    <h3>地图设计</h3>
                    <p>玩家设计的冒险地图、小游戏地图、建筑地图等创意作品。</p>
                    <a href="/nations?lang=zh" class="category-link">探索邦国地图 →</a>
                </div>
            </div>
            
            <h3>提交你的作品</h3>
            <p>我们欢迎所有玩家提交自己的创作作品！提交作品需要满足以下要求：</p>
            <ul class="submission-requirements">
                <li><strong>原创性：</strong> 作品必须为你原创或获得授权</li>
                <li><strong>质量要求：</strong> 作品应具有一定的完成度和质量</li>
                <li><strong>内容规范：</strong> 符合服务器规则，不包含违规内容</li>
                <li><strong>格式要求：</strong> 图片建议 PNG/JPG 格式，视频推荐 B 站或 YouTube 链接</li>
            </ul>
            
            <div class="submission-cta">
                <p>准备好分享你的作品了吗？</p>
                <a href="/contact?lang=zh" class="btn btn-primary">提交作品</a>
            </div>
            
            <h3>本月精选作品</h3>
            <div class="featured-works">
                <div class="featured-item">
                    <div class="featured-placeholder">🏆</div>
                    <h4>最佳建筑奖</h4>
                    <p>每月评选最优秀的建筑作品</p>
                </div>
                <div class="featured-item">
                    <div class="featured-placeholder">🎨</div>
                    <h4>最佳艺术奖</h4>
                    <p>表彰最具创意的艺术作品</p>
                </div>
                <div class="featured-item">
                    <div class="featured-placeholder">🎵</div>
                    <h4>最佳音乐奖</h4>
                    <p>奖励最动人的音乐创作</p>
                </div>
            </div>
            
            <div class="community-note">
                <h4>💡 创作小贴士</h4>
                <ul>
                    <li>使用游戏内的拍照功能或模组拍摄高清截图</li>
                    <li>为作品添加详细描述和背景故事</li>
                    <li>使用合适的标签方便分类和搜索</li>
                    <li>积极与其他创作者交流互动</li>
                    <li>关注官方公告了解创作活动和比赛信息</li>
                </ul>
            </div>
            <?php else: ?>
            <h2>Player Creation Showcase</h2>
            <p>Here showcases the amazing fan works from BangGuo Rise players. Whether it's magnificent builds, exquisite art, moving music, or exciting videos, you can share and appreciate them all here.</p>
            
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">🏛️</div>
                    <h3>Build Works</h3>
                    <p>Showcase magnificent buildings carefully designed by players, from classical castles to modern cities, each building is a crystallization of art.</p>
                    <a href="/video?lang=en" class="category-link">View Build Videos →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎨</div>
                    <h3>Artworks</h3>
                    <p>Visual art works including illustrations, pixel art, concept designs created by players, showcasing the worldview of BangGuo Rise.</p>
                    <a href="/announcements?lang=en" class="category-link">View Art Showcase →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎵</div>
                    <h3>Music Creation</h3>
                    <p>Original or adapted music works by players, including game soundtracks, theme songs, character songs, etc.</p>
                    <a href="/music?lang=en" class="category-link">Enter Music Zone →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🎬</div>
                    <h3>Video Works</h3>
                    <p>Exciting gameplay recordings, build timelapses, story short films, PVP highlights and other video content.</p>
                    <a href="/video?lang=en" class="category-link">Enter Video Zone →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">📝</div>
                    <h3>Literary Works</h3>
                    <p>Literary works based on BangGuo Rise worldview including novels, poems, stories, etc.</p>
                    <a href="/worldview?lang=en" class="category-link">Learn About Worldview →</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">🗺️</div>
                    <h3>Map Design</h3>
                    <p>Creative works including adventure maps, mini-game maps, build maps designed by players.</p>
                    <a href="/nations?lang=en" class="category-link">Explore Nation Maps →</a>
                </div>
            </div>
            
            <h3>Submit Your Work</h3>
            <p>We welcome all players to submit their creative works! Submissions must meet the following requirements:</p>
            <ul class="submission-requirements">
                <li><strong>Originality:</strong> Work must be original or properly authorized</li>
                <li><strong>Quality Standards:</strong> Work should have certain completion and quality level</li>
                <li><strong>Content Guidelines:</strong> Comply with server rules, no prohibited content</li>
                <li><strong>Format Requirements:</strong> Images in PNG/JPG format, videos recommended via Bilibili or YouTube links</li>
            </ul>
            
            <div class="submission-cta">
                <p>Ready to share your work?</p>
                <a href="/contact?lang=en" class="btn btn-primary">Submit Work</a>
            </div>
            
            <h3>Featured Works This Month</h3>
            <div class="featured-works">
                <div class="featured-item">
                    <div class="featured-placeholder">🏆</div>
                    <h4>Best Build Award</h4>
                    <p>Monthly selection of the most excellent build works</p>
                </div>
                <div class="featured-item">
                    <div class="featured-placeholder">🎨</div>
                    <h4>Best Art Award</h4>
                    <p>Recognizing the most creative artworks</p>
                </div>
                <div class="featured-item">
                    <div class="featured-placeholder">🎵</div>
                    <h4>Best Music Award</h4>
                    <p>Rewarding the most moving music creations</p>
                </div>
            </div>
            
            <div class="community-note">
                <h4>💡 Creation Tips</h4>
                <ul>
                    <li>Use in-game camera function or mods to take HD screenshots</li>
                    <li>Add detailed descriptions and background stories to your works</li>
                    <li>Use appropriate tags for easy categorization and search</li>
                    <li>Actively communicate and interact with other creators</li>
                    <li>Follow official announcements for creation events and competitions</li>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.fanworks-content {
    max-width: 1200px;
    margin: 0 auto;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin: 2.5rem 0;
}

.category-card {
    background: white;
    border: 2px solid #000;
    padding: 2rem;
    text-align: center;
    transition: all 0.2s ease;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.category-card:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.category-icon {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.category-card h3 {
    font-size: 1.3rem;
    margin-bottom: 1rem;
    color: #2c3e50;
    text-transform: uppercase;
}

.category-card p {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 2;
}

.category-link {
    color: #f59e0b;
    text-decoration: none;
    font-weight: bold;
    border: 2px solid #000;
    padding: 0.5rem 1rem;
    display: inline-block;
    background: #fff;
    box-shadow: 2px 2px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s;
}

.category-link:hover {
    transform: translate(-2px, -2px);
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.submission-requirements {
    background: #f8f9fa;
    border: 2px solid #000;
    padding: 1.5rem 2rem;
    margin: 1.5rem 0;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.submission-requirements li {
    margin-bottom: 1rem;
    line-height: 2;
}

.submission-cta {
    text-align: center;
    padding: 2.5rem;
    background: var(--primary);
    color: var(--dark);
    border: 4px solid #000;
    margin: 2.5rem 0;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.submission-cta p {
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    color: var(--dark) !important;
}

.submission-cta .btn-primary {
    display: inline-block;
    padding: 1rem 2.5rem;
    background: white;
    color: #f59e0b !important;
    text-decoration: none;
    border: 2px solid #000;
    font-weight: bold;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s;
}

.submission-cta .btn-primary:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.featured-works {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 2.5rem 0;
}

.featured-item {
    text-align: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border: 2px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.featured-placeholder {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.featured-item h4 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #2c3e50;
    text-transform: uppercase;
}

.featured-item p {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.8;
}

.community-note {
    background: var(--secondary);
    color: var(--dark) !important;
    padding: 2.5rem;
    border: 4px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    margin: 2rem 0;
}

.community-note h4 {
    margin-bottom: 1rem;
    font-size: 1.3rem;
    color: var(--dark) !important;
    text-transform: uppercase;
}

.community-note ul {
    margin-bottom: 0;
    margin-left: 1.5rem;
}

.community-note li {
    color: var(--dark) !important;
    margin-bottom: 0.6rem;
    line-height: 2;
}
</style>
