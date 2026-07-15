<?php
// SEO 优化元数据
if (is_chinese()) {
    seo()->setTitle('版权声明 - 邦国崛起 | 内容使用许可与版权保护');
    seo()->setDescription('了解邦国崛起官方网站的内容使用许可、版权声明和知识产权保护政策。包括玩家创作内容授权、商业使用规范、侵权举报等。服务器 IP: play.bgjq.top');
    seo()->setKeywords('版权声明，内容使用许可，版权保护，知识产权，DMCA，侵权举报，Minecraft 版权，游戏内容授权');
} else {
    seo()->setTitle('Copyright - BangGuo Rise | Content Licensing & Copyright Protection');
    seo()->setDescription('Learn about BangGuo Rise official website content licensing, copyright notices, and intellectual property protection policies. Including player content authorization, commercial use guidelines, infringement reporting. Server IP: play.bgjq.top');
    seo()->setKeywords('copyright, content licensing, copyright protection, intellectual property, DMCA, infringement reporting, Minecraft copyright, game content authorization');
}
?>

<section class="page-header">
    <div class="container">
        <h1><svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> <?php echo is_chinese() ? '版权声明' : 'Copyright'; ?></h1>
        <p><?php echo is_chinese() ? '了解内容使用许可与版权信息' : 'Learn about content licensing and copyright information'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="legal-content">
            <?php if (is_chinese()): ?>
            <h2>版权声明</h2>
            <p>本网站上所有内容，包括但不限于文字、图片、音频、视频等，均受版权法保护。</p>
            <h3>版权归属</h3>
            <p>网站原创内容版权归邦国崛起官方所有。玩家投稿内容版权归作者所有，但作者需授权我们使用。</p>
            <h3>使用限制</h3>
            <p>未经授权，禁止转载、复制、传播本网站的任何内容。</p>
            <?php else: ?>
            <h2>Copyright Notice</h2>
            <p>All content on this website, including but not limited to text, images, audio, video, etc., is protected by copyright law.</p>
            <h3>Copyright Ownership</h3>
            <p>Original content copyright belongs to BangGuo Rise. Player-submitted content belongs to the author, but authors must authorize our use.</p>
            <h3>Usage Restrictions</h3>
            <p>Without authorization, no copying, reproduction, or distribution of any content on this website is allowed.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
