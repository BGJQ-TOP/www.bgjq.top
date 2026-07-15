<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('隐私政策 - 邦国崛起 | 个人信息保护与数据安全');
    seo()->setDescription('邦国崛起隐私政策详细说明我们如何收集、使用、存储和保护您的个人信息。了解您的数据权利、Cookie 使用政策、数据保留期限等。服务器 IP: play.bgjq.top');
    seo()->setKeywords('隐私政策，个人信息保护，数据安全，隐私保护，Cookie 政策，数据收集，GDPR，用户隐私，网络安全');
} else {
    seo()->setTitle('Privacy Policy - BangGuo Rise | Personal Information Protection & Data Security');
    seo()->setDescription('BangGuo Rise Privacy Policy explains how we collect, use, store, and protect your personal information. Learn about your data rights, cookie policy, data retention, and more. Server IP: play.bgjq.top');
    seo()->setKeywords('privacy policy, personal information protection, data security, privacy protection, cookie policy, data collection, GDPR, user privacy, cybersecurity');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <?php echo is_chinese() ? '隐私政策' : 'Privacy Policy'; ?></h1>
        <p><?php echo is_chinese() ? '保护您的个人信息安全' : 'Protecting your personal information security'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="legal-content">
            <?php if (is_chinese()): ?>
            <h2>隐私政策</h2>
            <p class="last-updated">最后更新日期：2026 年 1 月 1 日</p>
            <p>邦国崛起 (以下简称"我们") 非常重视用户的隐私保护。本隐私政策详细说明了我们如何收集、使用、存储、共享和保护您的个人信息，以及您享有的相关权利。</p>
            
            <h3>1. 信息收集</h3>
            <p>我们可能收集以下类型的信息：</p>
            <ul>
                <li><strong>账户信息：</strong> 当您在服务器注册时，我们会收集您的游戏用户名、邮箱地址（如有提供）等基本信息。</li>
                <li><strong>游戏数据：</strong> 包括您的游戏进度、建筑作品、国家信息、聊天记录等游戏内产生的数据。</li>
                <li><strong>技术信息：</strong> 自动收集的 IP 地址、浏览器类型、操作系统、访问日期和时间、设备信息等。</li>
                <li><strong>使用信息：</strong> 您在网站和服务器上的活动记录，包括访问的页面、点击的链接、游戏时长等。</li>
                <li><strong>通信记录：</strong> 当您通过 QQ 群、Discord 或其他渠道联系我们时，我们可能会保存相关通信记录。</li>
            </ul>
            
            <h3>2. 信息使用</h3>
            <p>我们收集的信息用于以下目的：</p>
            <ul>
                <li>提供、维护和改进服务器质量</li>
                <li>处理您的请求和响应您的询问</li>
                <li>发送服务器公告、更新通知等重要信息</li>
                <li>分析使用趋势，优化用户体验</li>
                <li>防止欺诈、滥用和违法行为</li>
                <li>执行服务器规则和处理违规行为</li>
                <li>进行数据备份和安全防护</li>
            </ul>
            
            <h3>3. 信息共享</h3>
            <p>我们不会向第三方出售、出租或交易您的个人信息。但在以下情况下，我们可能会共享信息：</p>
            <ul>
                <li><strong>服务提供商：</strong> 与为我们提供服务的第三方（如主机服务商、CDN 服务商）共享必要的信息。</li>
                <li><strong>法律要求：</strong> 应法律要求或为了保护权利、安全和财产时。</li>
                <li><strong>业务转让：</strong> 在合并、收购或资产出售情况下，用户信息可能作为转让资产的一部分。</li>
            </ul>
            
            <h3>4. 信息保护</h3>
            <p>我们采取合理的技术和管理措施保护您的个人信息：</p>
            <ul>
                <li>使用加密技术保护数据传输</li>
                <li>限制员工访问个人信息的权限</li>
                <li>定期进行安全审计和漏洞扫描</li>
                <li>实施访问控制和身份验证机制</li>
                <li>定期备份数据以防丢失</li>
            </ul>
            
            <h3>5. Cookie 使用</h3>
            <p>我们使用 Cookie 和类似技术来：</p>
            <ul>
                <li>记住您的语言偏好和设置</li>
                <li>分析网站流量和使用情况</li>
                <li>提供个性化的用户体验</li>
                <li>跟踪会话状态</li>
            </ul>
            <p>您可以通过浏览器设置管理或禁用 Cookie，但这可能会影响网站的某些功能。</p>
            
            <h3>6. 数据保留</h3>
            <p>我们仅在必要的时间内保留您的个人信息：</p>
            <ul>
                <li>账户信息：在账户活跃期间及注销后 30 天内</li>
                <li>游戏数据：在账户活跃期间</li>
                <li>日志信息：最多保留 90 天</li>
                <li>通信记录：最多保留 1 年</li>
            </ul>
            
            <h3>7. 您的权利</h3>
            <p>根据适用的数据保护法律，您可能享有以下权利：</p>
            <ul>
                <li>访问您的个人信息</li>
                <li>更正不准确的个人信息</li>
                <li>删除您的个人信息</li>
                <li>限制或反对某些处理</li>
                <li>数据可携带性</li>
                <li>撤回同意</li>
            </ul>
            <p>如需行使上述权利，请通过联系方式与我们取得联系。</p>
            
            <h3>8. 儿童隐私</h3>
            <p>我们的服务面向所有年龄段的玩家，但我们特别关注儿童隐私保护。13 岁以下的儿童不应在未经家长同意的情况下提供个人信息。如果我们发现收集了 13 岁以下儿童的个人信息，我们将尽快删除这些数据。</p>
            
            <h3>9. 隐私政策更新</h3>
            <p>我们可能会不时更新本隐私政策。更新后的政策将在网站上发布，并在页面顶部标注最后更新日期。重大变更将通过服务器公告或邮件（如有收集）通知您。</p>
            
            <h3>10. 联系我们</h3>
            <p>如果您对本隐私政策有任何疑问、意见或投诉，请通过以下方式联系我们：</p>
            <ul>
                <li>QQ 群：<a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">点击加入</a></li>
                <li>Discord：<a href="https://discord.gg" target="_blank">点击加入</a></li>
                <li>邮箱：privacy@bgjq.top</li>
            </ul>
            <?php else: ?>
            <h2>Privacy Policy</h2>
            <p class="last-updated">Last Updated: January 1, 2026</p>
            <p>BangGuo Rise ("we", "us", or "our") values your privacy protection. This Privacy Policy explains in detail how we collect, use, store, share, and protect your personal information, as well as your related rights.</p>
            
            <h3>1. Information Collection</h3>
            <p>We may collect the following types of information:</p>
            <ul>
                <li><strong>Account Information:</strong> When you register on the server, we collect basic information such as your game username, email address (if provided), etc.</li>
                <li><strong>Game Data:</strong> Including your game progress, build works, nation information, chat records, and other data generated in-game.</li>
                <li><strong>Technical Information:</strong> Automatically collected IP address, browser type, operating system, access date and time, device information, etc.</li>
                <li><strong>Usage Information:</strong> Your activity records on the website and server, including pages visited, links clicked, game duration, etc.</li>
                <li><strong>Communication Records:</strong> When you contact us through QQ group, Discord, or other channels, we may save relevant communication records.</li>
            </ul>
            
            <h3>2. Information Use</h3>
            <p>The information we collect is used for the following purposes:</p>
            <ul>
                <li>Provide, maintain, and improve server quality</li>
                <li>Process your requests and respond to your inquiries</li>
                <li>Send server announcements, update notifications, and other important information</li>
                <li>Analyze usage trends and optimize user experience</li>
                <li>Prevent fraud, abuse, and illegal activities</li>
                <li>Enforce server rules and handle violations</li>
                <li>Perform data backup and security protection</li>
            </ul>
            
            <h3>3. Information Sharing</h3>
            <p>We do not sell, rent, or trade your personal information to third parties. However, we may share information in the following circumstances:</p>
            <ul>
                <li><strong>Service Providers:</strong> Share necessary information with third parties that provide services to us (such as hosting providers, CDN providers).</li>
                <li><strong>Legal Requirements:</strong> When required by law or to protect rights, safety, and property.</li>
                <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or asset sale, user information may be transferred as part of the assets.</li>
            </ul>
            
            <h3>4. Information Protection</h3>
            <p>We take reasonable technical and administrative measures to protect your personal information:</p>
            <ul>
                <li>Use encryption technology to protect data transmission</li>
                <li>Limit employee access to personal information</li>
                <li>Conduct regular security audits and vulnerability scans</li>
                <li>Implement access control and authentication mechanisms</li>
                <li>Regularly backup data to prevent loss</li>
            </ul>
            
            <h3>5. Cookie Usage</h3>
            <p>We use cookies and similar technologies to:</p>
            <ul>
                <li>Remember your language preferences and settings</li>
                <li>Analyze website traffic and usage</li>
                <li>Provide personalized user experience</li>
                <li>Track session status</li>
            </ul>
            <p>You can manage or disable cookies through your browser settings, but this may affect certain website functions.</p>
            
            <h3>6. Data Retention</h3>
            <p>We retain your personal information only for as long as necessary:</p>
            <ul>
                <li>Account Information: During account activity and up to 30 days after deletion</li>
                <li>Game Data: During account activity</li>
                <li>Log Information: Up to 90 days</li>
                <li>Communication Records: Up to 1 year</li>
            </ul>
            
            <h3>7. Your Rights</h3>
            <p>Under applicable data protection laws, you may have the following rights:</p>
            <ul>
                <li>Access to your personal information</li>
                <li>Correction of inaccurate personal information</li>
                <li>Deletion of your personal information</li>
                <li>Restriction or objection to certain processing</li>
                <li>Data portability</li>
                <li>Withdrawal of consent</li>
            </ul>
            <p>To exercise the above rights, please contact us through our contact information.</p>
            
            <h3>8. Children's Privacy</h3>
            <p>Our services are available to players of all ages, but we pay special attention to children's privacy protection. Children under 13 should not provide personal information without parental consent. If we discover that we have collected personal information from a child under 13, we will delete this data as soon as possible.</p>
            
            <h3>9. Privacy Policy Updates</h3>
            <p>We may update this Privacy Policy from time to time. The updated policy will be posted on the website with the last updated date marked at the top of the page. Significant changes will be notified to you through server announcements or email (if collected).</p>
            
            <h3>10. Contact Us</h3>
            <p>If you have any questions, comments, or complaints about this Privacy Policy, please contact us through the following methods:</p>
            <ul>
                <li>QQ Group: <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">Join Here</a></li>
                <li>Discord: <a href="https://discord.gg" target="_blank">Join Here</a></li>
                <li>Email: privacy@bgjq.top</li>
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
