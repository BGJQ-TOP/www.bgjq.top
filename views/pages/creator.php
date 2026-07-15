<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('创作者中心 - 邦国崛起创作扶持计划 | 音乐视频建筑艺术');
    seo()->setDescription('加入邦国崛起创作者中心，获取创作资源、流量扶持和变现机会！为音乐制作人、视频创作者、建筑大师、艺术家提供全方位支持。服务器 IP: bgjq.simpfun.cn');
    seo()->setKeywords('创作者中心，内容创作，创作者扶持，流量支持，变现机会，创作资源，MC 创作者，Minecraft 视频，游戏音乐，建筑创作');
} else {
    seo()->setTitle('Creator Center - BangGuo Rise Creator Support Program | Music Video Build Art');
    seo()->setDescription('Join BangGuo Rise Creator Center! Get creation resources, traffic support, and monetization opportunities. Comprehensive support for music producers, video creators, build masters, and artists. Server IP: bgjq.simpfun.cn');
    seo()->setKeywords('creator center, content creation, creator support, traffic support, monetization, creation resources, MC creator, Minecraft video, game music, build creation');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg> <?php echo is_chinese() ? '创作者中心' : 'Creator Center'; ?></h1>
        <p><?php echo is_chinese() ? '获取创作资源，开启你的创作之旅！' : 'Get creation resources and start your creative journey!'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="creator-content">
            <?php if (is_chinese()): ?>
            <h2>欢迎来到创作者中心</h2>
            <p>邦国崛起创作者中心致力于为内容创作者提供全方位的支持和资源。无论你是音乐制作人、视频创作者、建筑大师还是艺术家，这里都有你需要的工具和机会。</p>
            
            <div class="creator-benefits">
                <h3>创作者专属福利</h3>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">🎯</div>
                        <h4>流量扶持</h4>
                        <p>优秀作品将获得官方推荐，在网站首页、社交媒体等渠道展示，获得更多曝光机会。</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">💰</div>
                        <h4>变现机会</h4>
                        <p>通过创作激励计划、定制委托、打赏系统等多种方式实现创作变现。</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🛠️</div>
                        <h4>创作资源</h4>
                        <p>获取官方提供的素材库、工具包、教程资源，降低创作门槛。</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🏆</div>
                        <h4>荣誉认证</h4>
                        <p>优秀创作者可获得官方认证徽章、专属称号和特殊权限。</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">📚</div>
                        <h4>技能培训</h4>
                        <p>定期举办创作培训、经验分享会，邀请知名创作者授课指导。</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🤝</div>
                        <h4>社群交流</h4>
                        <p>加入创作者专属社群，与其他创作者交流合作，共同成长。</p>
                    </div>
                </div>
            </div>
            
            <h3>创作领域</h3>
            <div class="creator-fields">
                <div class="field-card">
                    <h4>🎵 音乐创作</h4>
                    <p>为服务器创作原创音乐、配乐、主题曲等作品。</p>
                    <ul>
                        <li>游戏背景音乐 (BGM)</li>
                        <li>服务器主题曲</li>
                        <li>角色印象曲</li>
                        <li>活动宣传音乐</li>
                    </ul>
                    <a href="/music?lang=zh" class="field-link">进入音乐专区 →</a>
                </div>
                
                <div class="field-card">
                    <h4>🎬 视频制作</h4>
                    <p>制作游戏相关视频内容，包括实况、建筑展示、剧情短片等。</p>
                    <ul>
                        <li>游戏实况解说</li>
                        <li>建筑延时摄影</li>
                        <li>剧情短片</li>
                        <li>PVP 精彩集锦</li>
                    </ul>
                    <a href="/video?lang=zh" class="field-link">进入视频专区 →</a>
                </div>
                
                <div class="field-card">
                    <h4>🏛️ 建筑设计</h4>
                    <p>设计并建造独特的建筑作品，展示建筑才华。</p>
                    <ul>
                        <li>城市规划</li>
                        <li>地标建筑</li>
                        <li>室内设计</li>
                        <li>红石机械</li>
                    </ul>
                    <a href="/worldview?lang=zh" class="field-link">了解世界观 →</a>
                </div>
                
                <div class="field-card">
                    <h4>🎨 视觉艺术</h4>
                    <p>创作插画、像素画、概念设计等视觉艺术作品。</p>
                    <ul>
                        <li>角色立绘</li>
                        <li>场景插画</li>
                        <li>像素艺术</li>
                        <li>宣传海报</li>
                    </ul>
                    <a href="/announcements?lang=zh" class="field-link">查看艺术展示 →</a>
                </div>
            </div>
            
            <h3>如何成为认证创作者</h3>
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <h4>提交申请</h4>
                    <p>填写创作者申请表，提供你的个人信息和创作经历。</p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <h4>作品审核</h4>
                    <p>提交至少 3 部代表作品，由官方团队进行审核评估。</p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <h4>获得认证</h4>
                    <p>审核通过后获得创作者认证，解锁专属功能和福利。</p>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <h4>持续创作</h4>
                    <p>保持创作活跃度，参与创作活动，提升创作者等级。</p>
                </div>
            </div>
            
            <div class="creator-cta">
                <h3>准备好开始创作之旅了吗？</h3>
                <p>加入邦国崛起创作者中心，让你的才华被更多人看见！</p>
                <a href="/contact?lang=zh" class="btn btn-primary btn-large">申请成为创作者</a>
            </div>
            
            <h3>常见问题</h3>
            <div class="faq-section">
                <div class="faq-item">
                    <h4>Q: 成为认证创作者需要什么条件？</h4>
                    <p>A: 你需要有一定的创作经验和作品积累，作品质量达到一定水准，并且愿意持续为社区创作内容。</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: 创作变现有哪些方式？</h4>
                    <p>A: 包括创作激励奖金、定制委托收入、观众打赏、官方合作推广等多种方式。</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: 我可以同时参与多个创作领域吗？</h4>
                    <p>A: 当然可以！我们鼓励创作者多元化发展，可以在多个领域展示才华。</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: 如何联系创作者团队？</h4>
                    <p>A: 加入我们的官方 QQ 群，有专门的创作者频道供交流使用。</p>
                </div>
            </div>
            <?php else: ?>
            <h2>Welcome to Creator Center</h2>
            <p>BangGuo Rise Creator Center is committed to providing comprehensive support and resources for content creators. Whether you're a music producer, video creator, build master, or artist, you'll find the tools and opportunities you need here.</p>
            
            <div class="creator-benefits">
                <h3>Exclusive Creator Benefits</h3>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">🎯</div>
                        <h4>Traffic Support</h4>
                        <p>Excellent works will be officially recommended and showcased on homepage, social media, and other channels for more exposure.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">💰</div>
                        <h4>Monetization</h4>
                        <p>Realize monetization through creation incentive programs, custom commissions, tipping systems, and more.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🛠️</div>
                        <h4>Creation Resources</h4>
                        <p>Access official asset libraries, toolkits, and tutorial resources to lower creation barriers.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🏆</div>
                        <h4>Honor Certification</h4>
                        <p>Excellent creators can receive official certification badges, exclusive titles, and special privileges.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">📚</div>
                        <h4>Skill Training</h4>
                        <p>Regular creation training and sharing sessions with renowned creators as instructors.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">🤝</div>
                        <h4>Community</h4>
                        <p>Join exclusive creator community to collaborate and grow with other creators.</p>
                    </div>
                </div>
            </div>
            
            <h3>Creation Fields</h3>
            <div class="creator-fields">
                <div class="field-card">
                    <h4>🎵 Music Creation</h4>
                    <p>Create original music, soundtracks, theme songs for the server.</p>
                    <ul>
                        <li>Game background music (BGM)</li>
                        <li>Server theme songs</li>
                        <li>Character impression songs</li>
                        <li>Event promotional music</li>
                    </ul>
                    <a href="/music?lang=en" class="field-link">Enter Music Zone →</a>
                </div>
                
                <div class="field-card">
                    <h4>🎬 Video Production</h4>
                    <p>Create game-related video content including gameplay, build showcases, story films, etc.</p>
                    <ul>
                        <li>Gameplay commentary</li>
                        <li>Build timelapse photography</li>
                        <li>Story short films</li>
                        <li>PVP highlight reels</li>
                    </ul>
                    <a href="/video?lang=en" class="field-link">Enter Video Zone →</a>
                </div>
                
                <div class="field-card">
                    <h4>🏛️ Build Design</h4>
                    <p>Design and construct unique build works to showcase architectural talent.</p>
                    <ul>
                        <li>City planning</li>
                        <li>Landmark buildings</li>
                        <li>Interior design</li>
                        <li>Redstone mechanics</li>
                    </ul>
                    <a href="/worldview?lang=en" class="field-link">Learn About Worldview →</a>
                </div>
                
                <div class="field-card">
                    <h4>🎨 Visual Arts</h4>
                    <p>Create visual art works including illustrations, pixel art, concept designs, etc.</p>
                    <ul>
                        <li>Character illustrations</li>
                        <li>Scene illustrations</li>
                        <li>Pixel art</li>
                        <li>Promotional posters</li>
                    </ul>
                    <a href="/announcements?lang=en" class="field-link">View Art Showcase →</a>
                </div>
            </div>
            
            <h3>How to Become a Certified Creator</h3>
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <h4>Submit Application</h4>
                    <p>Fill out creator application form with your personal information and creation experience.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <h4>Portfolio Review</h4>
                    <p>Submit at least 3 representative works for official team review and evaluation.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <h4>Get Certified</h4>
                    <p>Receive creator certification after approval and unlock exclusive features and benefits.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <h4>Keep Creating</h4>
                    <p>Maintain creation activity, participate in events, and improve creator level.</p>
                </div>
            </div>
            
            <div class="creator-cta">
                <h3>Ready to Start Your Creation Journey?</h3>
                <p>Join BangGuo Rise Creator Center and let your talent be seen by more people!</p>
                <a href="/contact?lang=en" class="btn btn-primary btn-large">Apply to Become a Creator</a>
            </div>
            
            <h3>FAQ</h3>
            <div class="faq-section">
                <div class="faq-item">
                    <h4>Q: What are the requirements to become a certified creator?</h4>
                    <p>A: You need to have certain creation experience and portfolio, with works reaching a certain quality standard, and be willing to continuously create content for the community.</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: What are the monetization methods?</h4>
                    <p>A: Including creation incentive bonuses, custom commission income, audience tips, official cooperation promotions, and more.</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: Can I participate in multiple creation fields?</h4>
                    <p>A: Absolutely! We encourage creators to develop diversely and showcase talents across multiple fields.</p>
                </div>
                
                <div class="faq-item">
                    <h4>Q: How to contact the creator team?</h4>
                    <p>A: Join our official QQ group, there are dedicated creator channels for communication.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.creator-content {
    max-width: 1200px;
    margin: 0 auto;
}

.creator-benefits {
    margin: 2.5rem 0;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.benefit-card {
    background: white;
    padding: 1.5rem;
    border: 2px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s ease;
}

.benefit-card:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.benefit-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.benefit-card h4 {
    font-size: 1.2rem;
    margin-bottom: 0.8rem;
    color: #2c3e50;
    text-transform: uppercase;
}

.benefit-card p {
    color: #666;
    line-height: 2;
}

.creator-fields {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin: 2.5rem 0;
}

.field-card {
    background: var(--primary);
    color: var(--dark);
    padding: 2rem;
    border: 4px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.field-card h4 {
    font-size: 1.4rem;
    margin-bottom: 1rem;
    text-transform: uppercase;
}

.field-card p {
    margin-bottom: 1.5rem;
    line-height: 2;
}

.field-card ul {
    margin-bottom: 1.5rem;
    list-style: none;
    padding: 0;
    margin-left: 1rem;
}

.field-card ul li {
    padding: 0.5rem 0;
    line-height: 2;
}

.field-link {
    color: var(--dark);
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
    padding: 0.8rem 1.5rem;
    border: 2px solid var(--dark);
    background: transparent;
    transition: all 0.2s;
}

.field-link:hover {
    background: var(--dark);
    color: var(--primary);
}

.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin: 2.5rem 0;
}

.step {
    text-align: center;
    padding: 1.5rem;
}

.step-number {
    width: 70px;
    height: 70px;
    background: var(--secondary);
    color: var(--dark);
    font-size: 2rem;
    font-weight: bold;
    border: 3px solid #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.step h4 {
    font-size: 1.2rem;
    margin-bottom: 0.8rem;
    color: #2c3e50;
    text-transform: uppercase;
}

.step p {
    color: #666;
    line-height: 2;
}

.creator-cta {
    text-align: center;
    padding: 3rem 2rem;
    background: var(--primary);
    color: var(--dark);
    border: 4px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    margin: 2.5rem 0;
}

.creator-cta h3 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    text-transform: uppercase;
}

.creator-cta p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    color: var(--dark) !important;
}

.btn-large {
    padding: 1.2rem 3rem;
    font-size: 1.1rem;
    display: inline-block;
    background: white;
    color: #f59e0b !important;
    border: 2px solid #000;
    font-weight: bold;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s;
}

.btn-large:hover {
    transform: translate(-4px, -4px);
    box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.3);
}

.faq-section {
    margin-top: 2.5rem;
}

.faq-item {
    background: #f8f9fa;
    border: 2px solid #000;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.faq-item h4 {
    font-size: 1.1rem;
    margin-bottom: 0.8rem;
    color: #2c3e50;
}

.faq-item p {
    color: #666;
    line-height: 2;
}
</style>
