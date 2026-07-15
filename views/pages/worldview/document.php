<?php
$docTitle = $document['document']['title'] ?? '文档预览';
$volTitle = $document['volume']['title'] ?? '';
?>

<!-- AEO 结构化数据：Article -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?php echo htmlspecialchars($docTitle); ?>",
  "description": "<?php echo htmlspecialchars($docTitle . ' - 邦国崛起服务器史书·国别体，' . $volTitle . '的详细内容记录。'); ?>",
  "author": {
    "@type": "Person",
    "name": "邦国崛起玩家"
  },
  "publisher": {
    "@type": "Organization",
    "name": "邦国崛起服务器"
  },
  "datePublished": "<?php echo date('Y-m-d'); ?>",
  "dateModified": "<?php echo date('Y-m-d'); ?>"
}
</script>

<section class="content-section" style="padding-top: 100px;">
    <div class="container">
        <div class="document-viewer">
            <div class="document-sidebar">
                <div class="sidebar-header">
                    <a href="/worldview" class="back-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                        返回文库
                    </a>
                    <h3 class="sidebar-volume-title"><?php echo htmlspecialchars($volTitle); ?></h3>
                </div>
                
                <nav class="sidebar-nav">
                    <?php foreach ($document['volume']['documents'] as $doc): ?>
                    <a href="/worldview/view?volume_id=<?php echo $document['volume']['id']; ?>&doc_id=<?php echo $doc['id']; ?>" 
                       class="sidebar-doc-link <?php echo $doc['id'] === $document['document']['id'] ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($doc['title']); ?>
                    </a>
                    <?php endforeach; ?>
                </nav>
            </div>
            
            <div class="document-main">
                <article class="document-content">
                    <header class="doc-header">
                        <div class="doc-breadcrumb">
                            <a href="/worldview">邦国文库</a>
                            <span class="separator">/</span>
                            <span><?php echo htmlspecialchars($volTitle); ?></span>
                        </div>
                        <h1 class="doc-title"><?php echo htmlspecialchars($docTitle); ?></h1>
                    </header>
                    
                    <div class="doc-body">
                        <?php echo $document['content']['html']; ?>
                    </div>
                    
                    <footer class="doc-footer">
                        <div class="doc-nav-links">
                            <?php
                            $docs = $document['volume']['documents'];
                            $currentIndex = array_search($document['document']['id'], array_column($docs, 'id'));
                            $prevIndex = $currentIndex > 0 ? $currentIndex - 1 : null;
                            $nextIndex = $currentIndex < count($docs) - 1 ? $currentIndex + 1 : null;
                            ?>
                            
                            <?php if ($prevIndex !== null): ?>
                            <a href="/worldview/view?volume_id=<?php echo $document['volume']['id']; ?>&doc_id=<?php echo $docs[$prevIndex]['id']; ?>" class="doc-nav-link prev-link">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                                <div>
                                    <span>上一篇</span>
                                    <strong><?php echo htmlspecialchars($docs[$prevIndex]['title']); ?></strong>
                                </div>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($nextIndex !== null): ?>
                            <a href="/worldview/view?volume_id=<?php echo $document['volume']['id']; ?>&doc_id=<?php echo $docs[$nextIndex]['id']; ?>" class="doc-nav-link next-link">
                                <div>
                                    <span>下一篇</span>
                                    <strong><?php echo htmlspecialchars($docs[$nextIndex]['title']); ?></strong>
                                </div>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </footer>
                </article>
            </div>
        </div>
    </div>
</section>

<style>
/* 文档阅读页面样式 - 与网站整体NES风格统一 */

/* Document Viewer Layout */
.document-viewer {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 24px;
    min-height: 80vh;
}

/* Sidebar */
.document-sidebar {
    position: sticky;
    top: 90px;
    height: fit-content;
    max-height: calc(100vh - 110px);
    overflow-y: auto;
    background-color: var(--white);
    border: 2px solid var(--border);
    padding: 20px;
    box-shadow: var(--shadow-sm);
}

.sidebar-header {
    margin-bottom: 16px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border);
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--text-light);
    text-decoration: none;
    font-size: 12px;
    margin-bottom: 12px;
    transition: color 0.2s;
    text-transform: uppercase;
}

.back-link:hover {
    color: var(--primary);
}

.back-link svg {
    width: 16px;
    height: 16px;
}

.sidebar-volume-title {
    font-size: 14px;
    color: var(--dark);
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.sidebar-doc-link {
    display: block;
    padding: 10px 12px;
    color: var(--text);
    text-decoration: none;
    font-size: 12px;
    transition: all 0.2s;
    border-left: 3px solid transparent;
    line-height: 1.4;
}

.sidebar-doc-link:hover {
    background-color: var(--light);
    color: var(--primary-dark);
}

.sidebar-doc-link.active {
    background-color: var(--light);
    color: var(--primary-dark);
    font-weight: normal;
    border-left-color: var(--primary);
}

/* Main Content */
.document-main {
    background-color: var(--white);
    border: 2px solid var(--border);
    padding: 32px;
    box-shadow: var(--shadow-sm);
}

.doc-header {
    margin-bottom: 24px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--border);
}

.doc-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: var(--text-light);
    margin-bottom: 12px;
    text-transform: uppercase;
}

.doc-breadcrumb a {
    color: var(--primary-dark);
    text-decoration: none;
}

.doc-breadcrumb a:hover {
    text-decoration: underline;
}

.doc-breadcrumb .separator {
    color: var(--text-muted);
}

.doc-title {
    font-size: 24px;
    color: var(--dark);
    margin: 0;
    line-height: 1.3;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Document Body - Markdown Content */
.doc-body {
    line-height: 1.8;
    font-size: 14px;
    color: var(--text);
}

.doc-body h1,
.doc-body h2,
.doc-body h3,
.doc-body h4 {
    color: var(--dark);
    margin-top: 28px;
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.doc-body h1 {
    font-size: 22px;
    border-bottom: 2px solid var(--primary);
    padding-bottom: 10px;
}

.doc-body h2 {
    font-size: 18px;
}

.doc-body h3 {
    font-size: 16px;
}

.doc-body h4 {
    font-size: 14px;
}

.doc-body p {
    margin-bottom: 16px;
}

.doc-body blockquote {
    background-color: var(--light);
    border-left: 4px solid var(--primary);
    padding: 16px 20px;
    margin: 20px 0;
    font-style: italic;
    color: var(--text-light);
}

.doc-body blockquote blockquote {
    background-color: var(--white);
    border-left-color: var(--primary-dark);
    margin: 12px 0 0;
}

.doc-body pre {
    background-color: var(--dark);
    color: var(--light);
    padding: 16px;
    border: 2px solid var(--border);
    overflow-x: auto;
    margin: 20px 0;
    font-family: 'Courier New', monospace;
    font-size: 12px;
}

.doc-body pre code {
    font-family: inherit;
    font-size: 12px;
    background: none;
    padding: 0;
    color: inherit;
}

.doc-body code {
    background-color: var(--light);
    padding: 2px 6px;
    border: 1px solid var(--border);
    font-family: 'Courier New', monospace;
    font-size: 12px;
    color: var(--primary-dark);
}

.doc-body table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: var(--white);
    border: 2px solid var(--border);
}

.doc-body table th {
    background-color: var(--light);
    font-weight: normal;
    padding: 12px 16px;
    text-align: left;
    border-bottom: 2px solid var(--border);
    color: var(--dark);
    text-transform: uppercase;
    font-size: 12px;
}

.doc-body table td {
    padding: 10px 16px;
    border-bottom: 1px solid var(--border);
}

.doc-body table tr:last-child td {
    border-bottom: none;
}

.doc-body table tr:hover {
    background-color: var(--light);
}

.doc-body hr {
    border: none;
    border-top: 2px solid var(--border);
    margin: 28px 0;
}

.doc-body ul,
.doc-body ol {
    margin-left: 24px;
    margin-bottom: 16px;
}

.doc-body li {
    margin-bottom: 8px;
}

.doc-body a {
    color: var(--primary-dark);
    text-decoration: underline;
}

.doc-body a:hover {
    color: var(--primary);
}

.doc-body img {
    max-width: 100%;
    height: auto;
    border: 2px solid var(--border);
}

/* Document Footer Navigation */
.doc-footer {
    margin-top: 40px;
    padding-top: 24px;
    border-top: 2px solid var(--border);
}

.doc-nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.doc-nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    background-color: var(--light);
    border: 2px solid var(--border);
    text-decoration: none;
    color: var(--text);
    transition: all 0.2s;
}

.doc-nav-link:hover {
    background-color: var(--primary);
    color: var(--dark);
    box-shadow: var(--shadow-sm);
}

.doc-nav-link svg {
    width: 18px;
    height: 18px;
    color: var(--primary-dark);
    flex-shrink: 0;
}

.doc-nav-link:hover svg {
    color: var(--dark);
}

.doc-nav-link span {
    font-size: 11px;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.doc-nav-link:hover span {
    color: var(--dark);
}

.doc-nav-link strong {
    display: block;
    margin-top: 4px;
    font-size: 13px;
    color: var(--dark);
    font-weight: normal;
    text-transform: uppercase;
}

.prev-link {
    justify-content: flex-start;
    text-align: left;
}

.next-link {
    justify-content: flex-end;
    text-align: right;
}

/* Responsive */
@media (max-width: 1024px) {
    .document-viewer {
        grid-template-columns: 1fr;
    }
    
    .document-sidebar {
        position: static;
        max-height: none;
        order: 2;
    }
    
    .document-main {
        order: 1;
    }
}

@media (max-width: 768px) {
    .document-main {
        padding: 20px;
    }
    
    .doc-title {
        font-size: 20px;
    }
    
    .doc-body h1 {
        font-size: 18px;
    }
    
    .doc-body h2 {
        font-size: 16px;
    }
    
    .doc-nav-links {
        grid-template-columns: 1fr;
    }
    
    .doc-nav-link {
        padding: 14px;
        min-height: 48px;
    }
}
</style>
