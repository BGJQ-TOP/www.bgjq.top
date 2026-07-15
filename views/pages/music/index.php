<?php
seo()->setTitle(is_chinese() ? '音乐专区 · 原创主题曲与同人音乐 · 邦国崛起创作者平台' : 'Music Zone · Original Themes & Fan Music · BangGuo Rise Creator Platform');
seo()->setDescription(is_chinese()
    ? '探索邦国崛起的原创音乐世界，包括主题曲、同人音乐、BGM 配乐等。45+ 创作者共同打造 128+ 首音乐作品。服务器 IP: bgjq.simpfun.cn'
    : 'Explore original music from BangGuo Rise: theme songs, fan music, and BGM. 45+ creators building 128+ tracks together.');
seo()->setKeywords(is_chinese()
    ? '邦国崛起音乐，MC 音乐，Minecraft 主题曲，同人音乐，游戏 BGM，创作者平台，原创音乐'
    : 'BangGuo Rise music, MC music, Minecraft theme, fan music, game BGM, creator platform, original music');
?>

<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div class="page-header-text">
                <h1><?php echo is_chinese() ? '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg> 音乐专区' : '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg> Music'; ?></h1>
                <p><?php echo is_chinese() ? '探索邦国崛起的原创音乐' : 'Explore original music from BangGuo Rise'; ?></p>
            </div>
            <a href="/music/submit?lang=<?php echo get_current_lang(); ?>" class="btn btn-primary btn-submit-music">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <?php echo is_chinese() ? '投稿音乐' : 'Submit Music'; ?>
            </a>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (empty($list)): ?>
        <div class="empty-state">
            <div class="empty-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg></div>
            <h3><?php echo is_chinese() ? '暂无音乐作品' : 'No music available'; ?></h3>
            <p><?php echo is_chinese() ? '敬请期待更多精彩音乐作品' : 'Stay tuned for more music'; ?></p>
        </div>
        <?php else: ?>
        <div class="music-grid">
            <?php foreach ($list as $music): ?>
            <div class="music-card">
                <div class="music-cover">
                    <?php if (!empty($music['cover_image'])): ?>
                    <img src="<?php echo htmlspecialchars($music['cover_image']); ?>" alt="<?php echo htmlspecialchars(bilingual()->getTitle($music)); ?>">
                    <?php else: ?>
                    <div class="music-cover-placeholder"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg></div>
                    <?php endif; ?>
                    <div class="music-play">
                        <a href="/music/<?php echo $music['id']; ?>?lang=<?php echo get_current_lang(); ?>" class="play-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
                    </div>
                </div>
                <div class="music-info">
                    <h3>
                        <a href="/music/<?php echo $music['id']; ?>?lang=<?php echo get_current_lang(); ?>">
                            <?php echo htmlspecialchars(bilingual()->getTitle($music)); ?>
                        </a>
                    </h3>
                    <p class="music-creator">
                        <?php echo is_chinese() ? '创作者' : 'Creator'; ?>: <?php echo htmlspecialchars($music['creator_name'] ?? 'Unknown'); ?>
                    </p>
                    <div class="music-stats">
                        <span><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg> <?php echo number_format($music['play_count'] ?? 0); ?></span>
                        <span><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> <?php echo number_format($music['like_count'] ?? 0); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if ($page > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="/music?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page - 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '上一页' : 'Previous'; ?>
            </a>
            <?php endif; ?>
            <span class="page-info"><?php echo $page; ?></span>
            <a href="/music?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page + 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '下一页' : 'Next'; ?>
            </a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
