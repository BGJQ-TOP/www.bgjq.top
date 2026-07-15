<?php
seo()->setTitle(is_chinese() ? '邦国列表 · 查看所有活跃邦国势力 · 邦国崛起官方' : 'Nations List · View All Active Nations · BangGuo Rise Official');
seo()->setDescription(is_chinese()
    ? '查看邦国崛起服务器中的所有活跃邦国势力，了解各邦国的领袖、成员数量、国家特色等详细信息。加入心仪的邦国，或者创建属于自己的国家。服务器 IP: bgjq.simpfun.cn'
    : 'View all active nations on BangGuo Rise server. Learn about leaders, member counts, and unique features. Join a nation or create your own.');
seo()->setKeywords(is_chinese()
    ? '邦国列表，MC 邦国，Minecraft 国家，国战服务器，邦国崛起邦国，服务器势力，国家列表'
    : 'nations list, MC nations, Minecraft countries, nation server, BangGuo Rise factions, country list');
?>

<section class="page-header">
    <div class="container">
        <h1><?php echo is_chinese() ? '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg> 邦国列表' : '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg> Nations'; ?></h1>
        <p><?php echo is_chinese() ? '查看服务器中的所有邦国' : 'View all nations on the server'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (empty($list)): ?>
        <div class="empty-state">
            <div class="empty-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg></div>
            <h3><?php echo is_chinese() ? '暂无邦国' : 'No nations available'; ?></h3>
            <p><?php echo is_chinese() ? '敬请期待更多邦国加入' : 'Stay tuned for more nations'; ?></p>
        </div>
        <?php else: ?>
        <div class="nations-grid">
            <?php foreach ($list as $nation): ?>
            <div class="nation-card">
                <div class="nation-banner"></div>
                <div class="nation-flag"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg></div>
                <div class="nation-content">
                    <h4>
                        <span>
                            <?php echo htmlspecialchars(is_chinese() ? ($nation['name_zh'] ?? $nation['name']) : ($nation['name_en'] ?? $nation['name'])); ?>
                        </span>
                    </h4>
                    <?php if (isset($nation['territory_size']) && $nation['territory_size'] > 0): ?>
                    <p class="nation-territory">
                        <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg>
                        <?php echo is_chinese() ? '疆土' : 'Territory'; ?>: <strong><?php echo number_format($nation['territory_size']); ?></strong> <?php echo is_chinese() ? '区块' : 'chunks'; ?>
                    </p>
                    <?php endif; ?>
                    <?php if (isset($nation['capital_x']) && isset($nation['capital_z'])): ?>
                    <p class="nation-capital">
                        <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="M2 12h2"></path><path d="M20 12h2"></path></svg>
                        <?php echo is_chinese() ? '王城坐标' : 'Capital'; ?>: <strong>(<?php echo $nation['capital_x']; ?>, <?php echo $nation['capital_z']; ?>)</strong>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
