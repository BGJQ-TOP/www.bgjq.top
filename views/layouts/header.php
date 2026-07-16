<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo seo()->renderAll(); ?>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/style-enhanced.css">
    <link rel="stylesheet" href="/public/css/style-optimized.css">
    <link rel="icon" type="image/x-icon" href="/public/images/favicon.ico">
    <script src="/public/js/main.js" defer></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo t('site_name'); ?>",
        "url": "https://www.bgjq.top",
        "logo": "https://www.bgjq.top/public/images/BGJQ.webp",
        "description": "<?php echo t('home_description'); ?>",
        "sameAs": [
            "<?php echo is_chinese() ? 'https://qm.qq.com/q/VgsQ0lZM0q' : 'https://discord.gg'; ?>"
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php echo t('site_name'); ?>",
        "url": "https://www.bgjq.top",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.bgjq.top/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
</head>
<body class="lang-<?php echo $lang; ?>">
    <header class="site-header">
        <div class="container">
            <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                <a href="/?lang=<?php echo $lang; ?>" class="logo-link" itemprop="url">
                    <img src="/public/images/BGJQ.webp" alt="<?php echo t('site_name'); ?> Logo" class="logo-img" itemprop="logo" width="160" height="40">
                </a>
            </div>
            
            <button class="mobile-menu-toggle" type="button" aria-label="<?php echo is_chinese() ? '切换导航菜单' : 'Toggle navigation menu'; ?>" aria-expanded="false" aria-controls="main-navigation">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
            
            <nav class="main-navigation" id="main-navigation" aria-label="<?php echo is_chinese() ? '主导航' : 'Main navigation'; ?>">
                <div class="header-actions">
                    <div class="lang-switcher">
                        <a href="<?php echo bilingual()->switchLangUrl('zh'); ?>" class="<?php echo $lang === 'zh' ? 'active' : ''; ?>">中文</a>
                        <a href="<?php echo bilingual()->switchLangUrl('en'); ?>" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a>
                    </div>
                    <a href="#join" class="btn-nav"><?php echo is_chinese() ? '立即加入' : 'Join Now'; ?></a>
                </div>
                <ul class="nav-menu">
                    <li><a href="/?lang=<?php echo $lang; ?>" class="<?php echo ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/?lang=' . $lang || $_SERVER['REQUEST_URI'] === '') ? 'active' : ''; ?>"><?php echo is_chinese() ? '首页' : 'Home'; ?></a></li>
                    <li><a href="/worldview?lang=<?php echo $lang; ?>" class="<?php echo strpos($_SERVER['REQUEST_URI'], '/worldview') !== false ? 'active' : ''; ?>"><?php echo t('worldview'); ?></a></li>
                    <li><a href="/nations?lang=<?php echo $lang; ?>" class="<?php echo strpos($_SERVER['REQUEST_URI'], '/nations') !== false ? 'active' : ''; ?>"><?php echo t('nations'); ?></a></li>
                    <li><a href="/music?lang=<?php echo $lang; ?>" class="<?php echo strpos($_SERVER['REQUEST_URI'], '/music') !== false ? 'active' : ''; ?>"><?php echo t('music'); ?></a></li>
                    <li><a href="/video?lang=<?php echo $lang; ?>" class="<?php echo strpos($_SERVER['REQUEST_URI'], '/video') !== false ? 'active' : ''; ?>"><?php echo t('video'); ?></a></li>
                    <li><a href="/announcements?lang=<?php echo $lang; ?>" class="<?php echo strpos($_SERVER['REQUEST_URI'], '/announcements') !== false ? 'active' : ''; ?>"><?php echo t('latest_news'); ?></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <ol>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="/?lang=<?php echo $lang; ?>" itemprop="item">
                            <span itemprop="name"><?php echo is_chinese() ? '首页' : 'Home'; ?></span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <?php 
                    // 根据当前页面路径生成面包屑
                    $currentPath = $_SERVER['REQUEST_URI'];
                    $pathSegments = explode('/', ltrim(parse_url($currentPath, PHP_URL_PATH), '/'));
                    $currentPath = '';
                    $position = 2;
                    
                    foreach ($pathSegments as $segment) {
                        if (empty($segment)) continue;
                        $currentPath .= '/' . $segment;
                        $title = ucfirst(str_replace('-', ' ', $segment));
                        
                        // 特殊页面标题映射
                        $titleMap = [
                            'worldview' => is_chinese() ? '世界观' : 'Worldview',
                            'nations' => is_chinese() ? '邦国' : 'Nations',
                            'music' => is_chinese() ? '音乐' : 'Music',
                            'video' => is_chinese() ? '视频' : 'Video',
                            'announcements' => is_chinese() ? '公告' : 'Announcements',
                            'about' => is_chinese() ? '关于我们' : 'About Us',
                            'privacy' => is_chinese() ? '隐私政策' : 'Privacy Policy',
                            'terms' => is_chinese() ? '服务条款' : 'Terms of Service',
                            'contact' => is_chinese() ? '联系我们' : 'Contact Us',
                            'copyright' => is_chinese() ? '版权信息' : 'Copyright',
                            'guide' => is_chinese() ? '新手指南' : 'Beginner Guide',
                            'fanworks' => is_chinese() ? '同人作品' : 'Fan Works',
                            'creator' => is_chinese() ? '创作者中心' : 'Creator Center'
                        ];
                        
                        if (isset($titleMap[$segment])) {
                            $title = $titleMap[$segment];
                        }
                        
                        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
                        echo '<a href="' . $currentPath . '?lang=' . $lang . '" itemprop="item">';
                        echo '<span itemprop="name">' . $title . '</span>';
                        echo '</a>';
                        echo '<meta itemprop="position" content="' . $position . '">';
                        echo '</li>';
                        $position++;
                    }
                    ?>
                </ol>
            </nav>
        </div>
    </div>

    <!-- 返回顶部按钮 -->
    <button class="scroll-to-top" aria-label="<?php echo is_chinese() ? '返回顶部' : 'Scroll to top'; ?>" title="<?php echo is_chinese() ? '返回顶部' : 'Scroll to top'; ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    <main class="site-main">
