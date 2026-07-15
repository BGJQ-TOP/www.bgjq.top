<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('联系我们 - 邦国崛起 | 客服支持与商务合作');
    seo()->setDescription('联系邦国崛起官方团队！获取客服支持、提交反馈建议、商务合作洽谈。QQ 群、邮箱等多种联系方式。服务器 IP: bgjq.simpfun.cn');
    seo()->setKeywords('联系我们，客服支持，商务合作，反馈建议，QQ 群，Discord，联系方式，玩家支持，服务器管理');
} else {
    seo()->setTitle('Contact Us - BangGuo Rise | Customer Support & Business Cooperation');
    seo()->setDescription('Contact BangGuo Rise official team! Get customer support, submit feedback, discuss business cooperation. QQ group, email and more contact methods. Server IP: bgjq.simpfun.cn');
    seo()->setKeywords('contact us, customer support, business cooperation, feedback, QQ group, Discord, contact information, player support, server management');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> <?php echo is_chinese() ? '联系我们' : 'Contact Us'; ?></h1>
        <p><?php echo is_chinese() ? '随时欢迎您的咨询与反馈' : 'Welcome to contact us anytime'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="legal-content">
            <?php if (is_chinese()): ?>
            <h2>联系我们</h2>
            <p>如果您有任何问题、建议或需要帮助，欢迎通过以下方式联系我们。</p>
            
            <h3>社群交流</h3>
            <p>推荐加入我们的官方社群与其他玩家交流：</p>
            <ul>
                <li><strong>QQ群：</strong> <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">点击加入官方QQ群</a></li>
            </ul>
            
            <h3>商务合作</h3>
            <p>如有商务合作意向，请发送邮件至：business@bgjq.top</p>
            
            <h3>反馈建议</h3>
            <p>您可以通过以下方式向我们反馈问题或建议：</p>
            <ul>
                <li>在QQ群中直接联系管理员</li>
                <li>发布帖文至服务器论坛</li>
            </ul>
            
            <h3>服务器信息</h3>
            <p><strong>服务器IP：</strong> bgjq.simpfun.cn</p>
            <?php else: ?>
            <h2>Contact Us</h2>
            <p>If you have any questions, suggestions, or need help, please feel free to contact us through the following methods.</p>
            
            <h3>Community</h3>
            <p>Join our official community to interact with other players:</p>
            <ul>
                <li><strong>QQ Group：</strong> <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank">Join Official QQ Group</a></li>
            </ul>
            
            <h3>Business Inquiries</h3>
            <p>For business cooperation, please email: business@bgjq.top</p>
            
            <h3>Feedback</h3>
            <p>You can provide feedback or suggestions through:</p>
            <ul>
                <li>Contact administrators directly in QQ group</li>
                <li>Post on the server forum</li>
            </ul>
            
            <h3>Server Information</h3>
            <p><strong>Server IP：</strong> bgjq.simpfun.cn</p>
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

.legal-content h3 {
    font-size: 1.3rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #34495e;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.legal-content > p {
    font-size: 1.1rem;
    line-height: 2.2;
    color: #666;
    margin-bottom: 2rem;
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
