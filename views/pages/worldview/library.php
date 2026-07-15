<?php
// SEO 优化：使用对话式标题和描述
seo()->setTitle('邦国崛起服务器史书 - 邦国文库 | Minecraft服务器历史');
seo()->setDescription('邦国崛起服务器史书·国别体，完整记录一周目、零周目历史，各邦国势力兴衰变迁，玩家刊物和奇闻轶事。');
seo()->setKeywords('邦国文库，邦国崛起，服务器史书，国别体，一周目，零周目，法兰维亚，拉曼却，幻影忍者，Minecraft服务器历史，邦国崛起历史，服务器史书，邦国崛起一周目，邦国崛起零周目');
?>

<!-- AEO 结构化数据：FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "邦国崛起服务器史书是什么？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "邦国崛起服务器史书是对Minecraft邦国崛起服务器发生过的大事小情的记录，采用国别体编撰，按邦国势力分别记述其兴衰变迁。"
      }
    },
    {
      "@type": "Question",
      "name": "邦国崛起服务器史书有哪些卷？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "本文库分为四卷：卷一·新世记（一周目历史）、卷二·旧世记（零周目历史）、卷三·刊物志（玩家创办之刊物记录）、卷四·轶事志（服务器奇闻轶事）。"
      }
    },
    {
      "@type": "Question",
      "name": "邦国崛起服务器有哪些邦国？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "主要邦国包括法兰维亚帝国、幻影忍者王国、逆熵、拉曼却公国、梁山泊国、伏见稻荷狐域、Blood of Death等。"
      }
    }
  ]
}
</script>

<section class="page-header">
    <div class="container">
        <h1>
            <svg class="icon-svg-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            世界观——邦国文库
        </h1>
        <p>邦国崛起服务器史书 · 国别体</p>
        <p class="header-quote">「此身浮沉又一季，何处战火引归乡？」</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if ($preface): ?>
        <div class="library-preface">
            <?php echo $preface['html']; ?>
        </div>
        <?php endif; ?>

        <div class="library-catalog">
            <h2 class="catalog-title">目录</h2>
            
            <?php foreach ($catalog['volumes'] as $index => $volume): ?>
            <div class="volume-section">
                <div class="volume-header">
                    <h3 class="volume-title">
                        <span class="volume-number"><?php echo $index + 1; ?></span>
                        <?php echo htmlspecialchars($volume['title']); ?>
                    </h3>
                    <p class="volume-desc"><?php echo htmlspecialchars($volume['description']); ?></p>
                </div>
                
                <div class="documents-list">
                    <?php foreach ($volume['documents'] as $doc): ?>
                    <a href="/worldview/view?volume_id=<?php echo $volume['id']; ?>&doc_id=<?php echo $doc['id']; ?>" class="document-link">
                        <span class="doc-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        <span class="doc-title"><?php echo htmlspecialchars($doc['title']); ?></span>
                        <svg class="doc-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="library-info">
            <h3 class="info-title">关于邦国文库</h3>
            <div class="info-content">
                <p>邦国崛起服务器史书系列文档是对Minecraft邦国崛起服务器发生过的大事小情的记录。本文档采用国别体编撰，按邦国势力分别记述其兴衰变迁。</p>
                <p>本文档完全为玩家自发创作，与bugjump、simpfun等主体无关。编辑人员鱼龙混杂，在此感谢他们的切实记录亦或胡编乱造。</p>
                <blockquote>注：史书有云系列文档已宣布暂停主线更新，但仍保留玩家无限编辑的权力。</blockquote>
            </div>
            
            <div class="info-links">
                <h4>友链</h4>
                <div class="links-grid">
                    <a href="http://bgjq.simpfun.cn" target="_blank" class="info-link-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                        <span>服务器网页地图</span>
                    </a>
                    <a href="https://wiki.bgjq.top/" target="_blank" class="info-link-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <span>服务器帮助文档</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* 邦国文库样式 - 与网站整体NES风格统一 */

/* 页面头部引用文字 */
.header-quote {
    font-size: 14px;
    color: var(--nes-gray);
    margin-top: 16px;
    font-style: italic;
}

/* 序言区域 */
.library-preface {
    margin-bottom: 48px;
}

.preface-content {
    background-color: var(--white);
    border: 2px solid var(--border);
    padding: 24px;
    line-height: 1.8;
    box-shadow: var(--shadow-sm);
}

.preface-content h2 {
    font-size: 20px;
    color: var(--dark);
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.preface-content h3 {
    font-size: 16px;
    color: var(--dark);
    margin: 20px 0 12px;
}

.preface-content p {
    color: var(--text);
    margin-bottom: 12px;
    font-size: 14px;
    line-height: 1.8;
}

.preface-content blockquote {
    background-color: var(--light);
    border-left: 4px solid var(--primary);
    padding: 16px 20px;
    margin: 20px 0;
    font-style: italic;
    color: var(--text-light);
}

.preface-content hr {
    border: none;
    border-top: 2px solid var(--border);
    margin: 24px 0;
}

.preface-content a {
    color: var(--primary);
    text-decoration: underline;
}

.preface-content a:hover {
    color: var(--primary-dark);
}

.preface-nav {
    text-align: center;
    margin-top: 24px;
}

/* 目录区域 */
.library-catalog {
    margin-bottom: 48px;
}

.catalog-title {
    font-size: 24px;
    color: var(--dark);
    margin-bottom: 32px;
    padding-bottom: 16px;
    border-bottom: 4px solid var(--border);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.volume-section {
    margin-bottom: 32px;
    background-color: var(--white);
    border: 2px solid var(--border);
    padding: 24px;
    box-shadow: var(--shadow-sm);
}

.volume-header {
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border);
}

.volume-title {
    font-size: 18px;
    color: var(--dark);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.volume-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background-color: var(--primary);
    color: var(--dark);
    border: 2px solid var(--border);
    font-size: 14px;
    font-weight: bold;
    flex-shrink: 0;
}

.volume-desc {
    color: var(--text-light);
    font-size: 13px;
    margin-left: 44px;
}

.documents-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-left: 44px;
}

.document-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background-color: var(--light);
    border: 2px solid var(--border);
    text-decoration: none;
    color: var(--dark);
    transition: all 0.2s ease;
    font-size: 13px;
}

.document-link:hover {
    background-color: var(--primary);
    color: var(--dark);
    transform: translateX(4px);
    box-shadow: var(--shadow-sm);
}

.doc-icon svg {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
}

.doc-title {
    flex: 1;
    font-weight: normal;
}

.doc-arrow {
    width: 16px;
    height: 16px;
    color: var(--text-muted);
    transition: transform 0.2s;
    flex-shrink: 0;
}

.document-link:hover .doc-arrow {
    transform: translateX(3px);
    color: var(--dark);
}

/* 关于区域 */
.library-info {
    background-color: var(--white);
    border: 2px solid var(--border);
    padding: 24px;
    box-shadow: var(--shadow-sm);
}

.info-title {
    font-size: 20px;
    color: var(--dark);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--border);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.info-content {
    background-color: var(--light);
    border: 2px solid var(--border);
    padding: 20px;
    margin-bottom: 24px;
    line-height: 1.8;
}

.info-content p {
    color: var(--text);
    margin-bottom: 12px;
    font-size: 13px;
    line-height: 1.8;
}

.info-content blockquote {
    background-color: var(--white);
    border-left: 4px solid var(--primary);
    padding: 12px 16px;
    margin: 16px 0 0;
    font-style: italic;
    color: var(--text-light);
    font-size: 12px;
}

.info-links h4 {
    font-size: 16px;
    color: var(--dark);
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
}

.info-link-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background-color: var(--light);
    border: 2px solid var(--border);
    text-decoration: none;
    color: var(--dark);
    transition: all 0.2s ease;
    font-size: 13px;
}

.info-link-item:hover {
    background-color: var(--primary);
    color: var(--dark);
    box-shadow: var(--shadow-sm);
}

.info-link-item svg {
    width: 18px;
    height: 18px;
    color: var(--primary-dark);
    flex-shrink: 0;
}

.info-link-item:hover svg {
    color: var(--dark);
}

/* 响应式 */
@media (max-width: 768px) {
    .volume-desc,
    .documents-list {
        margin-left: 0;
    }
    
    .links-grid {
        grid-template-columns: 1fr;
    }
    
    .document-link {
        padding: 14px 12px;
        min-height: 48px;
    }
    
    .info-link-item {
        padding: 14px 12px;
        min-height: 48px;
    }
}
</style>
