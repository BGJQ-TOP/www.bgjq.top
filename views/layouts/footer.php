    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-brand">
                    <img src="/public/images/BGJQ.webp" alt="<?php echo t('site_name'); ?>" class="footer-logo-img" loading="lazy" width="180" height="45">
                    <p><?php echo is_chinese() 
                        ? '全球最大的MC国战服务器，沉浸式国家外交与战争体验。中英双语支持，欢迎全球玩家加入！' 
                        : 'The largest MC nation warfare server. Immersive diplomacy and warfare. Bilingual support!'; ?></p>
                    <div class="footer-social">
                        <a href="https://qm.qq.com/q/VgsQ0lZM0q" target="_blank" rel="noopener noreferrer" aria-label="<?php echo is_chinese() ? '加入QQ群' : 'Join QQ Group'; ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></a>
                        <a href="https://space.bilibili.com" target="_blank" rel="noopener noreferrer" aria-label="Bilibili"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></a>
                        <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg></a>
                        <a href="https://github.com" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4><?php echo is_chinese() ? '游戏内容' : 'Game Content'; ?></h4>
                    <ul class="footer-menu">
                        <li><a href="/worldview?lang=<?php echo get_current_lang(); ?>"><?php echo t('worldview'); ?></a></li>
                        <li><a href="/nations?lang=<?php echo get_current_lang(); ?>"><?php echo t('nations'); ?></a></li>
                        <li><a href="/announcements?lang=<?php echo get_current_lang(); ?>"><?php echo t('latest_news'); ?></a></li>
                        <li><a href="/guide?lang=<?php echo get_current_lang(); ?>"><?php echo is_chinese() ? '新手指南' : 'Guide'; ?></a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4><?php echo is_chinese() ? '创作平台' : 'Creators'; ?></h4>
                    <ul class="footer-menu">
                        <li><a href="/fanworks?lang=<?php echo get_current_lang(); ?>"><?php echo is_chinese() ? '同人作品' : 'Fan Works'; ?></a></li>
                        <li><a href="/creator?lang=<?php echo get_current_lang(); ?>"><?php echo is_chinese() ? '创作者中心' : 'Creator Center'; ?></a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4><?php echo is_chinese() ? '关于我们' : 'About'; ?></h4>
                    <ul class="footer-menu">
                        <li><a href="/about?lang=<?php echo get_current_lang(); ?>"><?php echo t('about'); ?></a></li>
                        <li><a href="/privacy?lang=<?php echo get_current_lang(); ?>"><?php echo t('privacy'); ?></a></li>
                        <li><a href="/terms?lang=<?php echo get_current_lang(); ?>"><?php echo t('terms_of_service'); ?></a></li>
                        <li><a href="/contact?lang=<?php echo get_current_lang(); ?>"><?php echo is_chinese() ? '联系我们' : 'Contact'; ?></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo t('site_name'); ?>. <?php echo is_chinese() ? '保留所有权利' : 'All Rights Reserved'; ?>.</p>
                <div class="footer-bottom-links">
                    <a href="/privacy?lang=<?php echo get_current_lang(); ?>"><?php echo t('privacy'); ?></a>
                    <a href="/terms?lang=<?php echo get_current_lang(); ?>"><?php echo t('terms_of_service'); ?></a>
                    <a href="/copyright?lang=<?php echo get_current_lang(); ?>"><?php echo t('copyright'); ?></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
