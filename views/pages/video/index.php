<?php
seo()->setTitle(is_chinese() ? '视频专区 · 精彩实况与宣传片 · 邦国崛起创作者平台' : 'Video Zone · Gameplay & Trailers · BangGuo Rise Creator Platform');
seo()->setDescription(is_chinese()
    ? '观看邦国崛起的精彩视频内容，包括战争实况、建筑展示、宣传片、教程攻略等。256+ 视频，1.2M+ 播放量。服务器 IP: bgjq.simpfun.cn'
    : 'Watch amazing videos from BangGuo Rise: war reports, building showcases, trailers, tutorials. 256+ videos, 1.2M+ views.');
seo()->setKeywords(is_chinese()
    ? '邦国崛起视频，MC 视频，Minecraft 实况，国战视频，建筑展示，游戏教程，创作者平台'
    : 'BangGuo Rise videos, MC videos, Minecraft gameplay, warfare videos, building showcase, game tutorials, creator platform');
?>

<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div class="page-header-text">
                <h1><?php echo is_chinese() ? '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> 视频专区' : '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> Videos'; ?></h1>
                <p><?php echo is_chinese() ? '观看邦国崛起的精彩视频' : 'Watch amazing videos from BangGuo Rise'; ?></p>
            </div>
            <a href="/video/submit?lang=<?php echo get_current_lang(); ?>" class="btn btn-primary btn-submit-video">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <?php echo is_chinese() ? '投稿视频' : 'Submit Video'; ?>
            </a>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (empty($list)): ?>
        <div class="empty-state">
            <div class="empty-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>
            <h3><?php echo is_chinese() ? '暂无视频' : 'No videos available'; ?></h3>
            <p><?php echo is_chinese() ? '敬请期待更多精彩视频' : 'Stay tuned for more videos'; ?></p>
        </div>
        <?php else: ?>
        <div class="video-grid">
            <?php foreach ($list as $video): ?>
            <div class="video-card">
                <div class="video-cover">
                    <?php if (!empty($video['cover_image'])): ?>
                    <img src="<?php echo htmlspecialchars($video['cover_image']); ?>" alt="<?php echo htmlspecialchars(bilingual()->getTitle($video)); ?>">
                    <?php else: ?>
                    <div class="video-cover-placeholder"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>
                    <?php endif; ?>
                    <div class="video-play">
                        <a href="/video/<?php echo $video['id']; ?>?lang=<?php echo get_current_lang(); ?>" class="play-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
                    </div>
                </div>
                <div class="video-info">
                    <h3>
                        <a href="/video/<?php echo $video['id']; ?>?lang=<?php echo get_current_lang(); ?>">
                            <?php echo htmlspecialchars(bilingual()->getTitle($video)); ?>
                        </a>
                    </h3>
                    <p class="video-description">
                        <?php echo mb_substr(strip_tags(bilingual()->getDescription($video)), 0, 100); ?>...
                    </p>
                    <div class="video-stats">
                        <span><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg> <?php echo number_format($video['view_count'] ?? 0); ?></span>
                        <span><?php echo date('Y-m-d', strtotime($video['publish_time'] ?? 'now')); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
