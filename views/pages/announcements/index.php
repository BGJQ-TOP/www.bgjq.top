<?php
seo()->setTitle(is_chinese() ? '最新公告 · 服务器更新与活动资讯 · 邦国崛起官方' : 'Latest News · Server Updates & Events · BangGuo Rise Official');
seo()->setDescription(is_chinese()
    ? '获取邦国崛起服务器的最新公告、更新日志、活动资讯和重要通知。全球顶级 MC 国战服务器，支持中英双语。服务器 IP: bgjq.simpfun.cn'
    : 'Get the latest announcements, updates, and events from BangGuo Rise server. Top MC warfare server with bilingual support.');
seo()->setKeywords(is_chinese()
    ? '邦国崛起公告，MC 服务器公告，Minecraft 更新，服务器活动，国战服务器新闻，官方通知'
    : 'BangGuo Rise news, MC server announcements, Minecraft updates, server events, warfare server news, official notices');
?>

<section class="page-header">
    <div class="container">
        <h1><?php echo is_chinese() ? '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg> 最新公告' : '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg> Latest News'; ?></h1>
        <p><?php echo is_chinese() ? '了解服务器最新动态' : 'Stay updated with the latest server news'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (empty($list)): ?>
        <div class="empty-state">
            <div class="empty-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></div>
            <h3><?php echo is_chinese() ? '暂无公告' : 'No announcements available'; ?></h3>
        </div>
        <?php else: ?>
        <div class="news-list">
            <?php foreach ($list as $announcement): ?>
            <article class="news-item">
                <div class="news-date">
                    <span class="day"><?php echo date('d', strtotime($announcement['publish_time'])); ?></span>
                    <span class="month"><?php echo date('Y-m', strtotime($announcement['publish_time'])); ?></span>
                </div>
                <div class="news-content">
                    <h3>
                        <a href="/announcements/<?php echo $announcement['id']; ?>?lang=<?php echo get_current_lang(); ?>">
                            <?php echo htmlspecialchars(bilingual()->getTitle($announcement)); ?>
                        </a>
                    </h3>
                    <p><?php echo mb_substr(strip_tags(bilingual()->getContent($announcement)), 0, 200); ?>...</p>
                    <a href="/announcements/<?php echo $announcement['id']; ?>?lang=<?php echo get_current_lang(); ?>" class="read-more">
                        <?php echo is_chinese() ? '阅读全文' : 'Read More'; ?> →
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        
        <?php if ($page > 1 || count($list) >= 10): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="/announcements?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page - 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '上一页' : 'Previous'; ?>
            </a>
            <?php endif; ?>
            <span class="page-info"><?php echo $page; ?></span>
            <a href="/announcements?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page + 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '下一页' : 'Next'; ?>
            </a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
