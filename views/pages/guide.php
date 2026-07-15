<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('新手指南 - 邦国崛起完整入门教程与玩法攻略 | 从零开始成为传奇领袖');
    seo()->setDescription('新手入门必读！邦国崛起 (BangGuo Rise) 完整教程，包含基础操作、国家加入、城市建设、外交战争、资源管理等玩法攻略。服务器 IP: bgjq.simpfun.cn，支持 Minecraft Java/基岩版。立即开始你的国战之旅！');
    seo()->setKeywords('新手指南，入门教程，MC 国战，Minecraft 教程，邦国崛起攻略，服务器玩法，城市建设，外交战争，游戏教程，MC 服务器');
} else {
    seo()->setTitle('Beginner Guide - BangGuo Rise Complete Tutorial & Gameplay Tips | Start Your Journey');
    seo()->setDescription('Essential beginner guide for BangGuo Rise MC server. Complete tutorial covering basic operations, nation joining, city building, diplomacy, warfare, and resource management. Server IP: bgjq.simpfun.cn, supports Minecraft Java/Bedrock. Start your journey now!');
    seo()->setKeywords('beginner guide, tutorial, MC warfare, Minecraft server, BangGuo Rise guide, gameplay tips, city building, nation warfare, game tutorial, MC server');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path><path d="M13 19l6-6"></path><path d="M16 16l4 4"></path><path d="M19 21l2-2"></path></svg> <?php echo is_chinese() ? '新手指南' : 'Beginner Guide'; ?></h1>
        <p><?php echo is_chinese() ? '从零开始，成为邦国崛起的传奇领袖！' : 'Start from zero and become a legendary leader in BangGuo Rise!'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="guide-content">
            <?php if (is_chinese()): ?>
            <h2>欢迎来到邦国崛起！</h2>
            <p>如果你是第一次来到邦国崛起服务器，这份新手指南将帮助你快速上手。从基础操作到高级玩法，让我们一起开始这段奇妙的旅程！</p>
            
            <h3>第一步：连接服务器</h3>
            <p><strong>服务器 IP：</strong>bgjq.simpfun.cn</p>
            <p>在 Minecraft 多人游戏中添加服务器，输入 IP 地址后即可连接。我们支持 Minecraft Java 版和基岩版。</p>
            
            <h3>第二步：了解基础操作</h3>
            <ul>
                <li><strong>出生点保护：</strong> 新玩家会在出生点受到保护，熟悉环境</li>
                <li><strong>基础资源收集：</strong> 收集木材、石头等基础资源</li>
                <li><strong>合成台使用：</strong> 制作工具、武器和建筑材料</li>
                <li><strong>地图探索：</strong> 使用 F3 查看坐标，记录重要地点</li>
            </ul>
            
            <h3>第三步：加入或创建国家</h3>
            <p>在邦国崛起中，你可以选择加入现有国家或创建自己的国家：</p>
            <ul>
                <li><strong>加入国家：</strong> 使用/nation list 查看可用国家，申请加入</li>
                <li><strong>创建国家：</strong> 使用/nation create [国家名] 创建新国家（需要一定游戏币）</li>
                <li><strong>国家福利：</strong> 获得保护、资源共享、集体防御等优势</li>
            </ul>
            
            <h3>第四步：建设你的城市</h3>
            <p>城市建设是邦国崛起的核心玩法：</p>
            <ul>
                <li><strong>选择领地：</strong> 在国家领土内选择合适的地点</li>
                <li><strong>圈地保护：</strong> 使用金铲子圈定你的领地</li>
                <li><strong>城市规划：</strong> 合理划分住宅区、商业区、工业区</li>
                <li><strong>建筑风格：</strong> 发挥创意，打造独特建筑</li>
            </ul>
            
            <h3>第五步：外交与战争</h3>
            <p>邦国崛起的核心特色是真实的外交与战争系统：</p>
            <ul>
                <li><strong>外交关系：</strong> 与其他国家建立盟友、中立或敌对关系</li>
                <li><strong>贸易系统：</strong> 与其他玩家进行资源交易</li>
                <li><strong>战争机制：</strong> 宣战、攻城、占领领土</li>
                <li><strong>和平协议：</strong> 通过谈判签订条约</li>
            </ul>
            
            <h3>常用命令速查</h3>
            <div class="command-list">
                <p><code>/nation</code> - 国家相关操作</p>
                <p><code>/town</code> - 城镇管理</p>
                <p><code>/claim</code> - 领地圈定</p>
                <p><code>/tpa</code> - 请求传送</p>
                <p><code>/spawn</code> - 返回出生点</p>
                <p><code>/sethome</code> - 设置家</p>
            </div>
            
            <h3>进阶技巧</h3>
            <ul>
                <li><strong>红石科技：</strong> 学习红石电路，制作自动化农场</li>
                <li><strong>经济系统：</strong> 参与市场交易，积累财富</li>
                <li><strong>PVP 技巧：</strong> 练习战斗技巧，提升战斗力</li>
                <li><strong>团队合作：</strong> 与国民协作，共同发展</li>
            </ul>
            
            <div class="tip-box">
                <h4>💡 小贴士</h4>
                <ul>
                    <li>加入 QQ 群与其他玩家交流</li>
                    <li>查看公告了解服务器最新动态</li>
                    <li>尊重其他玩家，遵守服务器规则</li>
                    <li>遇到问题及时联系管理员</li>
                </ul>
            </div>
            
            <p class="guide-cta">准备好开始你的冒险了吗？立即加入邦国崛起，与全球玩家一起书写传奇！</p>
            <?php else: ?>
            <h2>Welcome to BangGuo Rise!</h2>
            <p>If you're new to BangGuo Rise server, this beginner guide will help you get started quickly. From basic operations to advanced gameplay, let's begin this wonderful journey together!</p>
            
            <h3>Step 1: Connect to Server</h3>
            <p><strong>Server IP:</strong> bgjq.simpfun.cn</p>
            <p>Add the server in Minecraft multiplayer mode and connect. We support both Java and Bedrock editions.</p>
            
            <h3>Step 2: Learn Basic Operations</h3>
            <ul>
                <li><strong>Spawn Protection:</strong> New players are protected at spawn to familiarize with the environment</li>
                <li><strong>Resource Collection:</strong> Gather basic resources like wood and stone</li>
                <li><strong>Crafting Table:</strong> Make tools, weapons, and building materials</li>
                <li><strong>Map Exploration:</strong> Use F3 to view coordinates and mark important locations</li>
            </ul>
            
            <h3>Step 3: Join or Create a Nation</h3>
            <p>In BangGuo Rise, you can join an existing nation or create your own:</p>
            <ul>
                <li><strong>Join Nation:</strong> Use /nation list to view available nations and apply</li>
                <li><strong>Create Nation:</strong> Use /nation create [nation name] to create a new nation (requires game currency)</li>
                <li><strong>Nation Benefits:</strong> Get protection, resource sharing, and collective defense</li>
            </ul>
            
            <h3>Step 4: Build Your City</h3>
            <p>City building is the core gameplay of BangGuo Rise:</p>
            <ul>
                <li><strong>Choose Territory:</strong> Select a suitable location within your nation's territory</li>
                <li><strong>Claim Land:</strong> Use golden shovel to mark your territory</li>
                <li><strong>City Planning:</strong> Reasonably divide residential, commercial, and industrial areas</li>
                <li><strong>Architecture Style:</strong> Be creative and build unique structures</li>
            </ul>
            
            <h3>Step 5: Diplomacy and Warfare</h3>
            <p>The core feature of BangGuo Rise is the real diplomacy and warfare system:</p>
            <ul>
                <li><strong>Diplomatic Relations:</strong> Establish alliances, neutrality, or hostility with other nations</li>
                <li><strong>Trade System:</strong> Trade resources with other players</li>
                <li><strong>Warfare:</strong> Declare war, siege cities, occupy territories</li>
                <li><strong>Peace Treaties:</strong> Sign treaties through negotiation</li>
            </ul>
            
            <h3>Common Commands Quick Reference</h3>
            <div class="command-list">
                <p><code>/nation</code> - Nation-related operations</p>
                <p><code>/town</code> - Town management</p>
                <p><code>/claim</code> - Land claiming</p>
                <p><code>/tpa</code> - Request teleport</p>
                <p><code>/spawn</code> - Return to spawn</p>
                <p><code>/sethome</code> - Set home</p>
            </div>
            
            <h3>Advanced Tips</h3>
            <ul>
                <li><strong>Redstone Technology:</strong> Learn redstone circuits and make automated farms</li>
                <li><strong>Economic System:</strong> Participate in market trading and accumulate wealth</li>
                <li><strong>PVP Skills:</strong> Practice combat techniques and improve fighting ability</li>
                <li><strong>Teamwork:</strong> Collaborate with nation members for common development</li>
            </ul>
            
            <div class="tip-box">
                <h4>💡 Tips</h4>
                <ul>
                    <li>Join QQ group to communicate with other players</li>
                    <li>Check announcements for latest server updates</li>
                    <li>Respect other players and follow server rules</li>
                    <li>Contact administrators if you encounter problems</li>
                </ul>
            </div>
            
            <p class="guide-cta">Ready to start your adventure? Join BangGuo Rise now and write your legend with players worldwide!</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.guide-content {
    max-width: 900px;
    margin: 0 auto;
    line-height: 2;
}

.guide-content h2 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-bottom: 4px solid #000;
    padding-bottom: 1rem;
}

.guide-content h3 {
    font-size: 1.3rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #34495e;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.guide-content p {
    margin-bottom: 1.2rem;
    line-height: 2.2;
}

.guide-content ul {
    margin-bottom: 1.5rem;
    margin-left: 2rem;
}

.guide-content li {
    margin-bottom: 0.8rem;
    line-height: 2;
}

.guide-content strong {
    color: #f59e0b;
}

.command-list {
    background: #f8f9fa;
    border: 2px solid #000;
    padding: 1.5rem;
    margin: 1.5rem 0;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.command-list p {
    font-family: 'Courier New', monospace;
    margin-bottom: 0.8rem;
}

.command-list code {
    background: #e9ecef;
    padding: 0.3rem 0.6rem;
    border: 1px solid #000;
    font-family: 'Courier New', monospace;
    font-weight: bold;
}

.tip-box {
    background: var(--primary);
    color: var(--dark) !important;
    padding: 2rem;
    border: 4px solid #000;
    border-radius: 0;
    margin: 2.5rem 0;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.tip-box h4 {
    margin-bottom: 1rem;
    font-size: 1.3rem;
    color: var(--dark) !important;
    text-transform: uppercase;
}

.tip-box ul {
    margin-bottom: 0;
    margin-left: 1.5rem;
}

.tip-box li {
    color: var(--dark) !important;
    margin-bottom: 0.6rem;
}

.guide-cta {
    text-align: center;
    font-size: 1.3rem;
    font-weight: bold;
    margin-top: 3rem;
    padding: 2rem;
    background: var(--secondary);
    color: var(--dark) !important;
    border: 4px solid #000;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
}

.guide-cta a {
    display: inline-block;
    margin-top: 1rem;
    padding: 1rem 2rem;
    background: #fff;
    color: #f59e0b !important;
    border: 2px solid #000;
    font-weight: bold;
    box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.3);
    transition: all 0.2s;
}

.guide-cta a:hover {
    transform: translate(-2px, -2px);
    box-shadow: 6px 6px 0px rgba(0, 0, 0, 0.3);
}
</style>

<!-- 结构化数据：教程文章 -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "<?php echo is_chinese() ? '新手指南 - 邦国崛起完整入门教程' : 'Beginner Guide - BangGuo Rise Complete Tutorial'; ?>",
    "description": "<?php echo is_chinese() ? '邦国崛起新手入门完整教程，包含基础操作、国家加入、城市建设、外交战争等玩法攻略' : 'Complete beginner tutorial for BangGuo Rise MC server, covering basic operations, nation joining, city building, diplomacy and warfare'; ?>",
    "image": "https://www.bgjq.top/public/images/BGJQ.webp",
    "author": {
        "@type": "Organization",
        "name": "邦国崛起官方网站",
        "url": "https://www.bgjq.top"
    },
    "publisher": {
        "@type": "Organization",
        "name": "邦国崛起官方网站",
        "url": "https://www.bgjq.top",
        "logo": {
            "@type": "ImageObject",
            "url": "https://www.bgjq.top/public/images/BGJQ.webp"
        }
    },
    "datePublished": "2026-01-01",
    "dateModified": "2026-01-01",
    "mainEntity": {
        "@type": "HowTo",
        "name": "<?php echo is_chinese() ? '如何开始玩邦国崛起' : 'How to Start Playing BangGuo Rise'; ?>",
        "step": [
            {
                "@type": "HowToStep",
                "name": "<?php echo is_chinese() ? '连接服务器' : 'Connect to Server'; ?>",
                "text": "<?php echo is_chinese() ? '在 Minecraft 中添加服务器 IP: bgjq.simpfun.cn' : 'Add server IP bgjq.simpfun.cn in Minecraft'; ?>"
            },
            {
                "@type": "HowToStep",
                "name": "<?php echo is_chinese() ? '了解基础操作' : 'Learn Basic Operations'; ?>",
                "text": "<?php echo is_chinese() ? '熟悉游戏操作、资源收集、合成台使用等基础功能' : 'Familiarize with game operations, resource collection, crafting table usage'; ?>"
            },
            {
                "@type": "HowToStep",
                "name": "<?php echo is_chinese() ? '加入或创建国家' : 'Join or Create a Nation'; ?>",
                "text": "<?php echo is_chinese() ? '使用/nation 命令加入现有国家或创建自己的国家' : 'Use /nation command to join existing nation or create your own'; ?>"
            }
        ]
    }
}
</script>
