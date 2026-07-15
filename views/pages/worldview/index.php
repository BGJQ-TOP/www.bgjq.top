<?php
seo()->setTitle(is_chinese() ? '世界观 · 编年史与势力设定 · 邦国崛起史诗剧情' : 'Worldview · Chronicle & Nation Lore · BangGuo Rise Epic Story');
seo()->setDescription(is_chinese()
    ? '探索邦国崛起的完整世界观，包括编年史、势力设定、术语库和官方剧情。50+ 历史事件、200+ 邦国设定。服务器 IP: bgjq.simpfun.cn'
    : 'Explore the complete worldview of BangGuo Rise: chronicles, nation lore, terminology, and official stories. 50+ events, 200+ settings.');
seo()->setKeywords(is_chinese()
    ? '邦国崛起世界观，MC 世界观，编年史，势力设定，术语库，官方剧情，Minecraft 背景故事'
    : 'BangGuo Rise worldview, MC lore, chronicle, nation settings, terminology, official story, Minecraft background');
?>

<style>
/* ========================================
   Worldview Page - Modern Design System
   完全独立于 NES 框架的现代化样式
   ======================================== */

/* CSS Variables - Worldview Theme */
:root {
    --wv-primary: #f59e0b;
    --wv-primary-dark: #d97706;
    --wv-accent: #8b5cf6;
    --wv-dark: #1f2937;
    --wv-dark-lighter: #374151;
    --wv-gray: #6b7280;
    --wv-gray-light: #9ca3af;
    --wv-gray-lighter: #e5e7eb;
    --wv-bg: #f9fafb;
    --wv-white: #ffffff;
    --wv-text: #1f2937;
    --wv-text-secondary: #4b5563;
    --wv-text-muted: #6b7280;
    
    /* Shadows */
    --wv-shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --wv-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --wv-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --wv-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    
    /* Border Radius */
    --wv-radius-sm: 6px;
    --wv-radius: 12px;
    --wv-radius-lg: 16px;
    --wv-radius-xl: 24px;
}

/* Reset NES font for this page */
.worldview-page,
.worldview-page * {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Page Header - Modern Gradient Style */
.worldview-page .page-header {
    background: linear-gradient(135deg, var(--wv-dark) 0%, var(--wv-dark-lighter) 100%);
    padding: 100px 0 60px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.worldview-page .page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.5;
}

.worldview-page .page-header .container {
    position: relative;
    z-index: 1;
}

.worldview-page .page-header h1 {
    font-size: 42px;
    font-weight: 800;
    color: var(--wv-white);
    margin-bottom: 16px;
    letter-spacing: -0.02em;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.worldview-page .page-header h1 svg {
    width: 40px;
    height: 40px;
    stroke: var(--wv-primary);
    margin-right: 12px;
    vertical-align: middle;
}

.worldview-page .page-header p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Content Section */
.worldview-page .content-section {
    padding: 48px 0 80px;
    background: var(--wv-bg);
}

/* Tabs - Modern Pill Style */
.worldview-page .worldview-tabs {
    display: flex;
    gap: 12px;
    margin-bottom: 40px;
    flex-wrap: wrap;
    justify-content: center;
}

.worldview-page .worldview-tabs .tab {
    padding: 12px 24px;
    background: var(--wv-white);
    border: 2px solid var(--wv-gray-lighter);
    border-radius: 50px;
    font-size: 14px;
    font-weight: 500;
    color: var(--wv-text-secondary);
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    box-shadow: var(--wv-shadow-sm);
}

.worldview-page .worldview-tabs .tab:hover {
    border-color: var(--wv-primary);
    color: var(--wv-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--wv-shadow);
}

.worldview-page .worldview-tabs .tab.active {
    background: linear-gradient(135deg, var(--wv-primary) 0%, var(--wv-primary-dark) 100%);
    border-color: var(--wv-primary);
    color: var(--wv-white);
    box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);
}

/* Grid Layout */
.worldview-page .worldview-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

/* Card - Modern Glassmorphism Style */
.worldview-page .worldview-card {
    background: var(--wv-white);
    border-radius: var(--wv-radius);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: var(--wv-shadow);
    border: 1px solid var(--wv-gray-lighter);
}

.worldview-page .worldview-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--wv-shadow-lg);
    border-color: var(--wv-primary);
}

.worldview-page .worldview-card-link {
    display: block;
    color: inherit;
    text-decoration: none;
}

/* Cover Image */
.worldview-page .worldview-cover {
    height: 180px;
    background: linear-gradient(135deg, var(--wv-dark) 0%, var(--wv-accent) 100%);
    position: relative;
    overflow: hidden;
}

.worldview-page .worldview-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.worldview-page .worldview-card:hover .worldview-cover img {
    transform: scale(1.1);
}

.worldview-page .worldview-cover-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.9);
}

.worldview-page .worldview-cover-placeholder svg {
    width: 56px;
    height: 56px;
    stroke: currentColor;
    stroke-width: 1.5;
}

.worldview-page .worldview-cover-placeholder::after {
    content: attr(data-type);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    opacity: 0.8;
}

/* Content Area */
.worldview-page .worldview-content {
    padding: 24px;
}

.worldview-page .worldview-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.worldview-page .worldview-type {
    display: inline-flex;
    align-items: center;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Type Colors */
.worldview-page .worldview-type.type-chronicle {
    background: rgba(245, 158, 11, 0.15);
    color: var(--wv-primary-dark);
}

.worldview-page .worldview-type.type-nation {
    background: rgba(239, 68, 68, 0.15);
    color: #dc2626;
}

.worldview-page .worldview-type.type-term {
    background: rgba(16, 185, 129, 0.15);
    color: #059669;
}

.worldview-page .worldview-type.type-story {
    background: rgba(139, 92, 246, 0.15);
    color: #7c3aed;
}

.worldview-page .worldview-date {
    font-size: 13px;
    color: var(--wv-text-muted);
    font-weight: 400;
}

/* Title */
.worldview-page .worldview-content h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    line-height: 1.4;
}

.worldview-page .worldview-content h3 a {
    color: var(--wv-primary);
    text-decoration: underline;
}

.worldview-page .worldview-content h3 a:hover {
    color: var(--wv-primary-dark);
}

/* Description */
.worldview-page .worldview-content p {
    font-size: 14px;
    color: var(--wv-text-secondary);
    line-height: 1.7;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Empty State */
.worldview-page .empty-state {
    text-align: center;
    padding: 80px 20px;
    background: var(--wv-white);
    border-radius: var(--wv-radius);
    box-shadow: var(--wv-shadow);
}

.worldview-page .empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, var(--wv-gray-lighter) 0%, #f3f4f6 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.worldview-page .empty-icon svg {
    width: 40px;
    height: 40px;
    stroke: var(--wv-gray);
    stroke-width: 1.5;
}

.worldview-page .empty-state h3 {
    font-size: 22px;
    font-weight: 700;
    color: var(--wv-text);
    margin-bottom: 8px;
}

.worldview-page .empty-state p {
    font-size: 15px;
    color: var(--wv-text-muted);
    margin-bottom: 24px;
}

.worldview-page .empty-actions .btn {
    display: inline-flex;
    align-items: center;
    padding: 12px 28px;
    background: linear-gradient(135deg, var(--wv-primary) 0%, var(--wv-primary-dark) 100%);
    color: var(--wv-white);
    font-size: 15px;
    font-weight: 600;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);
}

.worldview-page .empty-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
}

/* Pagination */
.worldview-page .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-top: 48px;
}

.worldview-page .pagination .btn {
    padding: 10px 20px;
    background: var(--wv-white);
    border: 2px solid var(--wv-gray-lighter);
    border-radius: var(--wv-radius-sm);
    font-size: 14px;
    font-weight: 500;
    color: var(--wv-text-secondary);
    text-decoration: none;
    transition: all 0.2s ease;
}

.worldview-page .pagination .btn:hover {
    border-color: var(--wv-primary);
    color: var(--wv-primary-dark);
}

.worldview-page .pagination .page-info {
    padding: 10px 20px;
    background: var(--wv-primary);
    color: var(--wv-white);
    border-radius: var(--wv-radius-sm);
    font-weight: 600;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .worldview-page .worldview-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .worldview-page .page-header {
        padding: 80px 0 48px;
    }
    
    .worldview-page .page-header h1 {
        font-size: 28px;
    }
    
    .worldview-page .page-header h1 svg {
        width: 32px;
        height: 32px;
    }
    
    .worldview-page .worldview-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .worldview-page .worldview-tabs {
        gap: 8px;
    }
    
    .worldview-page .worldview-tabs .tab {
        padding: 10px 18px;
        font-size: 13px;
    }
    
    .worldview-page .worldview-cover {
        height: 200px;
    }
}

@media (max-width: 480px) {
    .worldview-page .page-header h1 {
        font-size: 24px;
    }
    
    .worldview-page .worldview-content {
        padding: 20px;
    }
    
    .worldview-page .worldview-content h3 {
        font-size: 16px;
    }
}
</style>

<div class="worldview-page">

<section class="page-header">
    <div class="container">
        <h1><?php echo is_chinese() ? '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> 世界观——邦国文库' : '<svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Worldview — BangGuo Library'; ?></h1>
        <p><?php echo is_chinese() ? '探索邦国崛起的史诗世界' : 'Explore the epic world of BangGuo Rise'; ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="worldview-tabs">
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>" class="tab <?php echo empty($type) ? 'active' : ''; ?>">
                <?php echo is_chinese() ? '全部' : 'All'; ?>
            </a>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&type=chronicle" class="tab <?php echo $type === 'chronicle' ? 'active' : ''; ?>">
                <?php echo is_chinese() ? '编年史' : 'Chronicle'; ?>
            </a>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&type=nation" class="tab <?php echo $type === 'nation' ? 'active' : ''; ?>">
                <?php echo is_chinese() ? '势力设定' : 'Nations'; ?>
            </a>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&type=term" class="tab <?php echo $type === 'term' ? 'active' : ''; ?>">
                <?php echo is_chinese() ? '术语库' : 'Terms'; ?>
            </a>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&type=story" class="tab <?php echo $type === 'story' ? 'active' : ''; ?>">
                <?php echo is_chinese() ? '官方剧情' : 'Stories'; ?>
            </a>
        </div>
        
        <?php if (empty($list)): ?>
        <div class="empty-state">
            <div class="empty-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg></div>
            <h3><?php echo is_chinese() ? '暂无内容' : 'No content available'; ?></h3>
            <p><?php echo is_chinese() ? '该分类下暂时没有内容，去看看其他分类吧' : 'No content in this category yet, check out others'; ?></p>
            <div class="empty-actions">
                <a href="/worldview?lang=<?php echo get_current_lang(); ?>" class="btn btn-primary">
                    <?php echo is_chinese() ? '查看全部内容' : 'View All Content'; ?>
                </a>
            </div>
        </div>
        <?php else: ?>
        <div class="worldview-grid">
            <?php
            $typeNames = [
                'chronicle' => is_chinese() ? '编年史' : 'Chronicle',
                'nation' => is_chinese() ? '势力设定' : 'Nation',
                'term' => is_chinese() ? '术语库' : 'Term',
                'story' => is_chinese() ? '剧情' : 'Story'
            ];
            $typeIcons = [
                'chronicle' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
                'nation' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg>',
                'term' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path><path d="M12 7v10"></path><path d="M9 10h6"></path></svg>',
                'story' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>'
            ];
            foreach ($list as $item):
            ?>
            <article class="worldview-card">
                <a href="/worldview/<?php echo $item['id']; ?>?lang=<?php echo get_current_lang(); ?>" class="worldview-card-link" aria-label="<?php echo htmlspecialchars(bilingual()->getTitle($item)); ?>">
                    <div class="worldview-cover">
                        <?php if (!empty($item['cover_image'])): ?>
                        <img src="<?php echo htmlspecialchars($item['cover_image']); ?>" alt="<?php echo htmlspecialchars(bilingual()->getTitle($item)); ?>">
                        <?php else: ?>
                        <div class="worldview-cover-placeholder" data-type="<?php echo $typeNames[$item['content_type']] ?? ''; ?>">
                            <?php echo $typeIcons[$item['content_type']] ?? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>'; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="worldview-content">
                        <div class="worldview-meta">
                            <span class="worldview-type type-<?php echo htmlspecialchars($item['content_type']); ?>">
                                <?php echo $typeNames[$item['content_type']] ?? $item['content_type']; ?>
                            </span>
                            <span class="worldview-date"><?php echo date('Y-m-d', strtotime($item['publish_time'] ?? 'now')); ?></span>
                        </div>
                        <h3><?php echo htmlspecialchars(bilingual()->getTitle($item)); ?></h3>
                        <p><?php
                            $summary = strip_tags(bilingual()->getContent($item));
                            $summary = mb_substr($summary, 0, 120);
                            if (mb_strlen(strip_tags(bilingual()->getContent($item))) > 120) {
                                $summary .= '...';
                            }
                            echo htmlspecialchars($summary);
                        ?></p>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        
        <?php if ($page > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page - 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '上一页' : 'Previous'; ?>
            </a>
            <?php endif; ?>
            <span class="page-info"><?php echo $page; ?></span>
            <a href="/worldview?lang=<?php echo get_current_lang(); ?>&page=<?php echo $page + 1; ?>" class="btn btn-secondary">
                <?php echo is_chinese() ? '下一页' : 'Next'; ?>
            </a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

</div><!-- /.worldview-page -->
