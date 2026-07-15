<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('服务条款 - 邦国崛起 | 服务器使用规则与用户协议');
    seo()->setDescription('请仔细阅读邦国崛起服务器的服务条款和用户协议。了解服务器使用规则、禁止行为、违规处理措施、免责声明、消费与退款政策等。服务器 IP: play.bgjq.top');
    seo()->setKeywords('服务条款，用户协议，服务器规则，使用规范，违规行为，处罚措施，免责声明，退款政策，Minecraft 服务器规则');
} else {
    seo()->setTitle('Terms of Service - BangGuo Rise | Server Usage Rules & User Agreement');
    seo()->setDescription('Read the Terms of Service for BangGuo Rise server. Learn about usage rules, prohibited behaviors, violation handling, disclaimers, payment and refund policies. Server IP: play.bgjq.top');
    seo()->setKeywords('terms of service, user agreement, server rules, usage guidelines, violations, penalties, disclaimer, refund policy, Minecraft server rules');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> <?php echo is_chinese() ? '服务条款' : 'Terms of Service'; ?></h1>
        <p><?php echo is_chinese() ? '了解服务器使用规则与用户协议' : 'Understand server usage rules and user agreement'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="legal-content">
            <?php if (is_chinese()): ?>
            <h2>服务条款</h2>
            <p class="last-updated">最后更新日期：2026 年 1 月 1 日</p>
            <p>欢迎使用邦国崛起 (BangGuo Rise) 服务器！在使用我们的服务之前，请仔细阅读并同意以下条款。如果您不同意这些条款，请不要使用我们的服务。</p>
            
            <h3>1. 服务说明</h3>
            <p>邦国崛起是一个 Minecraft 多人游戏服务器，提供国战、城市建设、外交系统等游戏内容。我们保留随时修改、暂停或终止服务的权利，恕不另行通知。</p>
            
            <h3>2. 使用规则</h3>
            <p>使用本服务器即表示您同意遵守以下规则：</p>
            <ul>
                <li><strong>公平竞争：</strong> 禁止任何形式的作弊、使用外挂、利用游戏漏洞等不公平行为。</li>
                <li><strong>尊重他人：</strong> 禁止辱骂、歧视、骚扰、威胁其他玩家或工作人员。</li>
                <li><strong>合法内容：</strong> 禁止发布违法、色情、暴力、政治敏感或其他不当内容。</li>
                <li><strong>禁止破坏：</strong> 禁止恶意破坏其他玩家的建筑、偷窃、PK 骚扰等影响他人游戏体验的行为。</li>
                <li><strong>广告限制：</strong> 未经许可，禁止在服务器内发布商业广告或宣传其他服务器。</li>
                <li><strong>账号安全：</strong> 请妥善保管您的账号，不要与他人共享。因个人原因导致的账号损失由您自行承担。</li>
                <li><strong>工作人员指令：</strong> 请服从服务器管理员和 moderators 的合理指示和管理。</li>
            </ul>
            
            <h3>3. 违规处理</h3>
            <p>违反上述规则将根据情节轻重受到以下处理：</p>
            <ul>
                <li><strong>警告：</strong> 轻微违规将收到口头或书面警告。</li>
                <li><strong>临时封禁：</strong> 中等违规将被暂时封禁，封禁期限视情节而定。</li>
                <li><strong>永久封禁：</strong> 严重违规或屡教不改者将被永久封禁，不得再次加入服务器。</li>
                <li><strong>数据清除：</strong> 对于作弊、恶意破坏等行为，我们保留清除违规者游戏数据的权利。</li>
            </ul>
            <p>封禁申诉可通过官方 QQ 群、Discord 或邮件进行。</p>
            
            <h3>4. 知识产权</h3>
            <p>服务器相关内容（包括但不限于插件、地图、建筑风格、世界观设定等）归邦国崛起所有。未经授权，不得用于商业用途。</p>
            <p>玩家在服务器内创作的内容（建筑、艺术品等）归玩家本人所有，但授权服务器在宣传、展示等活动中使用。</p>
            
            <h3>5. 数据与隐私</h3>
            <p>使用本服务器即表示您同意我们根据《隐私政策》收集、使用和保护您的个人信息。详细内容请查看我们的隐私政策页面。</p>
            
            <h3>6. 消费与退款</h3>
            <p>服务器可能提供赞助、捐赠等自愿消费项目：</p>
            <ul>
                <li>所有消费均为自愿性质，不构成强制性交易。</li>
                <li>赞助获得的虚拟道具、权限等一经发放，原则上不予退款。</li>
                <li>如因服务器原因导致服务终止，我们将根据实际情况提供相应补偿。</li>
            </ul>
            
            <h3>7. 免责声明</h3>
            <p>在适用法律允许的最大范围内，邦国崛起不承担以下责任：</p>
            <ul>
                <li>因网络问题、服务器故障等不可抗力导致的数据丢失或损坏。</li>
                <li>因第三方原因（如黑客攻击、DDoS 等）导致的服务中断。</li>
                <li>玩家之间的纠纷、交易损失等。</li>
                <li>因使用或无法使用本服务而导致的任何间接、附带或后果性损害。</li>
            </ul>
            
            <h3>8. 条款修改</h3>
            <p>我们保留随时修改本服务条款的权利。修改后的条款将在网站上公布，重大变更将通过服务器公告通知。继续使用服务即表示您接受修改后的条款。</p>
            
            <h3>9. 服务终止</h3>
            <p>我们保留在以下情况下终止向您提供服务的权利：</p>
            <ul>
                <li>严重违反服务条款</li>
                <li>长期不活跃（超过 6 个月未登录）</li>
                <li>服务器停止运营</li>
                <li>其他合理原因</li>
            </ul>
            
            <h3>10. 法律适用</h3>
            <p>本服务条款受中华人民共和国法律管辖。如发生争议，双方应友好协商解决；协商不成的，可向有管辖权的人民法院提起诉讼。</p>
            
            <h3>11. 联系我们</h3>
            <p>如果您对本服务条款有任何疑问，请通过以下方式联系我们：</p>
            <ul>
                <li>QQ 群：<a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">点击加入</a></li>
                <li>Discord：<a href="https://discord.gg" target="_blank">点击加入</a></li>
                <li>邮箱：terms@bgjq.top</li>
            </ul>
            <?php else: ?>
            <h2>Terms of Service</h2>
            <p class="last-updated">Last Updated: January 1, 2026</p>
            <p>Welcome to BangGuo Rise server! Before using our services, please read and agree to the following terms carefully. If you do not agree to these terms, please do not use our services.</p>
            
            <h3>1. Service Description</h3>
            <p>BangGuo Rise is a Minecraft multiplayer game server providing nation warfare, city building, diplomacy systems, and other game content. We reserve the right to modify, suspend, or terminate the service at any time without prior notice.</p>
            
            <h3>2. Usage Rules</h3>
            <p>By using this server, you agree to comply with the following rules:</p>
            <ul>
                <li><strong>Fair Competition:</strong> No cheating, use of hacks, exploitation of game bugs, or other unfair behaviors.</li>
                <li><strong>Respect Others:</strong> No insulting, discriminating, harassing, or threatening other players or staff.</li>
                <li><strong>Legal Content:</strong> No illegal, pornographic, violent, politically sensitive, or other inappropriate content.</li>
                <li><strong>No Griefing:</strong> No malicious destruction of other players' builds, theft, PK harassment, or other behaviors that affect others' gaming experience.</li>
                <li><strong>Advertising Restrictions:</strong> No commercial advertisements or promotion of other servers without permission.</li>
                <li><strong>Account Security:</strong> Please keep your account secure and do not share it with others. You are responsible for any account loss due to personal reasons.</li>
                <li><strong>Staff Instructions:</strong> Please comply with reasonable instructions and management from server administrators and moderators.</li>
            </ul>
            
            <h3>3. Violation Handling</h3>
            <p>Violations of the above rules will result in the following penalties depending on severity:</p>
            <ul>
                <li><strong>Warning:</strong> Minor violations will receive verbal or written warnings.</li>
                <li><strong>Temporary Ban:</strong> Moderate violations will result in temporary bans, with duration depending on severity.</li>
                <li><strong>Permanent Ban:</strong> Serious violations or repeat offenders will be permanently banned and not allowed to rejoin the server.</li>
                <li><strong>Data Clear:</strong> For cheating, malicious destruction, etc., we reserve the right to clear violators' game data.</li>
            </ul>
            <p>Ban appeals can be made through official QQ group, Discord, or email.</p>
            
            <h3>4. Intellectual Property</h3>
            <p>Server-related content (including but not limited to plugins, maps, building styles, worldview settings, etc.) belongs to BangGuo Rise. Unauthorized commercial use is prohibited.</p>
            <p>Content created by players within the server (builds, artworks, etc.) belongs to the players themselves, but authorizes the server to use them in promotions, exhibitions, and other activities.</p>
            
            <h3>5. Data and Privacy</h3>
            <p>By using this server, you agree that we collect, use, and protect your personal information according to our "Privacy Policy". Please see our Privacy Policy page for details.</p>
            
            <h3>6. Payments and Refunds</h3>
            <p>The server may offer voluntary payment options such as sponsorships and donations:</p>
            <ul>
                <li>All payments are voluntary and do not constitute mandatory transactions.</li>
                <li>Virtual items and permissions obtained through sponsorships are generally non-refundable once issued.</li>
                <li>If service termination is due to server reasons, we will provide appropriate compensation based on actual circumstances.</li>
            </ul>
            
            <h3>7. Disclaimer</h3>
            <p>To the maximum extent permitted by applicable law, BangGuo Rise is not liable for:</p>
            <ul>
                <li>Data loss or damage due to network issues, server failures, or other force majeure.</li>
                <li>Service interruptions due to third-party reasons (such as hacker attacks, DDoS, etc.).</li>
                <li>Disputes between players, transaction losses, etc.</li>
                <li>Any indirect, incidental, or consequential damages arising from use or inability to use this service.</li>
            </ul>
            
            <h3>8. Terms Modification</h3>
            <p>We reserve the right to modify these Terms of Service at any time. Modified terms will be published on the website, and significant changes will be notified through server announcements. Continued use of the service constitutes acceptance of the modified terms.</p>
            
            <h3>9. Service Termination</h3>
            <p>We reserve the right to terminate your service under the following circumstances:</p>
            <ul>
                <li>Serious violation of Terms of Service</li>
                <li>Long-term inactivity (no login for more than 6 months)</li>
                <li>Server shutdown</li>
                <li>Other reasonable reasons</li>
            </ul>
            
            <h3>10. Governing Law</h3>
            <p>These Terms of Service are governed by the laws of the People's Republic of China. In case of disputes, both parties should negotiate in good faith; if negotiation fails, litigation may be filed with the competent People's Court.</p>
            
            <h3>11. Contact Us</h3>
            <p>If you have any questions about these Terms of Service, please contact us through the following methods:</p>
            <ul>
                <li>QQ Group: <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">Join Here</a></li>
                <li>Discord: <a href="https://discord.gg" target="_blank">Join Here</a></li>
                <li>Email: terms@bgjq.top</li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.legal-content {
    max-width: 900px;
    margin: 0 auto;
}

.legal-content h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-bottom: 4px solid #000;
    padding-bottom: 1rem;
}

.legal-content .last-updated {
    font-size: 0.9rem;
    color: #999;
    margin-bottom: 2rem;
    font-style: italic;
}

.legal-content > p {
    font-size: 1.1rem;
    line-height: 2.2;
    color: #666;
    margin-bottom: 2rem;
}

.legal-content h3 {
    font-size: 1.3rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #34495e;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.legal-content ul {
    margin-bottom: 1.5rem;
    margin-left: 2rem;
}

.legal-content li {
    margin-bottom: 1rem;
    line-height: 2.2;
    color: #666;
}

.legal-content strong {
    color: #f59e0b;
}

.legal-content a {
    color: #667eea;
    text-decoration: underline;
}

.legal-content a:hover {
    color: #764ba2;
}
</style>
