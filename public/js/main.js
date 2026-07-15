document.addEventListener('DOMContentLoaded', function() {
    initCopyButtons();
    initLangSwitcher();
    initServerStatus();
    initCountryList();
    initUptime();
    initMobileMenu();
    initFloatingTitleBox();
    initScrollEffects();
    initSmoothScroll();
    initNavbarScroll();
    initRevealAnimations();
    initTouchOptimizations();
    initHeroCounter();
    initParallaxEffects();
});

function initMobileMenu() {
    var mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    var mainNavigation = document.querySelector('.main-navigation');
    var siteHeader = document.querySelector('.site-header');
    
    if (mobileMenuToggle && mainNavigation) {
        // 切换菜单状态
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            mainNavigation.classList.toggle('active');
            
            // 添加/移除body滚动锁定
            if (mainNavigation.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        // 点击导航链接后关闭菜单
        var navLinks = mainNavigation.querySelectorAll('a');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenuToggle.classList.remove('active');
                mainNavigation.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // 点击页面其他区域关闭菜单
        document.addEventListener('click', function(e) {
            if (mainNavigation.classList.contains('active') && 
                !mainNavigation.contains(e.target) && 
                !mobileMenuToggle.contains(e.target)) {
                mobileMenuToggle.classList.remove('active');
                mainNavigation.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
        
        // ESC键关闭菜单
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNavigation.classList.contains('active')) {
                mobileMenuToggle.classList.remove('active');
                mainNavigation.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
        
        // 窗口大小改变时重置菜单状态
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                mobileMenuToggle.classList.remove('active');
                mainNavigation.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
}

function initCopyButtons() {
    var buttons = document.querySelectorAll('.copy-ip-btn');
    
    buttons.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            var ip = this.getAttribute('data-ip') || 'bgjq.simpfun.cn';
            
            var btnElement = this;
            copyToClipboard(ip, function() {
                var lang = document.body.classList.contains('lang-zh') ? 'zh' : 'en';
                var copiedText = lang === 'zh' ? '已复制!' : 'Copied!';
                
                var originalHTML = btnElement.innerHTML;
                btnElement.classList.add('copied');
                btnElement.innerHTML = '<span>' + copiedText + '</span>';
                
                setTimeout(function() {
                    btnElement.classList.remove('copied');
                    btnElement.innerHTML = originalHTML;
                }, 2000);
            });
        });
    });
}

function copyToClipboard(text, callback) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function() {
            if (callback) callback();
        }).catch(function(err) {
            fallbackCopy(text, callback);
        });
    } else {
        fallbackCopy(text, callback);
    }
}

function fallbackCopy(text, callback) {
    var textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.left = '-9999px';
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
        if (callback) callback();
    } catch (err) {
        console.error('Copy failed:', err);
    }
    
    document.body.removeChild(textarea);
}

function initLangSwitcher() {
    var switchers = document.querySelectorAll('.lang-switcher a');
    
    switchers.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var url = this.getAttribute('href');
            if (url) {
                window.location.href = url;
            }
        });
    });
}

// 服务器状态API - 从motd.minebbs.com获取
function initServerStatus() {
    var playerElement = document.getElementById('online-players');
    var heroPlayerElement = document.getElementById('hero-online-players');
    
    fetch('https://motd.minebbs.com/api/status?ip=bgjq.simpfun.cn')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var onlinePlayers = 0;
            var maxPlayers = 0;
            
            if (data && data.status === 'online') {
                onlinePlayers = data.players ? data.players.online : 0;
                maxPlayers = data.players ? data.players.max : 0;
                
                // 更新服务器状态为在线
                var statusElement = document.getElementById('server-status');
                if (statusElement) {
                    statusElement.textContent = document.body.classList.contains('lang-zh') ? '在线' : 'Online';
                    statusElement.classList.add('online');
                }
            } else {
                var statusElement = document.getElementById('server-status');
                if (statusElement) {
                    statusElement.textContent = document.body.classList.contains('lang-zh') ? '离线' : 'Offline';
                    statusElement.classList.remove('online');
                }
            }
            
            // 更新在线玩家显示
            if (playerElement) {
                playerElement.textContent = onlinePlayers + '/' + maxPlayers;
            }
            if (heroPlayerElement) {
                heroPlayerElement.textContent = onlinePlayers + '+';
            }
        })
        .catch(function(error) {
            console.error('Failed to fetch server status:', error);
            if (playerElement) playerElement.textContent = '--';
            if (heroPlayerElement) heroPlayerElement.textContent = '--';
        });
}

// 邦国列表API
function initCountryList() {
    var countryListElement = document.getElementById('country-list');
    var heroNationCountElement = document.getElementById('hero-nation-count');
    
    if (!countryListElement && !heroNationCountElement) return;
    
    fetch('/api/nations')
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(result) {
            if (!result.success || !Array.isArray(result.data)) return;
            
            var countries = result.data;
            
            // 按领土大小排序，取前5个
            countries.sort(function(a, b) {
                return b.territory_size - a.territory_size;
            });
            
            var topNations = countries.slice(0, 5);
            
            // 更新邦国数量显示（显示前5个）
            if (heroNationCountElement) {
                heroNationCountElement.textContent = topNations.length;
            }
            
            // 更新邦国列表
            if (countryListElement) {
                // 清空现有内容
                countryListElement.innerHTML = '';
                
                // 显示前5个邦国
                topNations.forEach(function(country, index) {
                    var icons = [
                        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg>',
                        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path><path d="M13 19l6-6"></path><path d="M16 16l4 4"></path><path d="M19 21l2-2"></path></svg>',
                        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
                        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
                        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg>'
                    ];
                    var icon = icons[index % icons.length];
                    
                    var card = document.createElement('div');
                    card.className = 'nation-card';
                    card.innerHTML = 
                        '<div class="nation-banner"></div>' +
                        '<div class="nation-flag">' + icon + '</div>' +
                        '<div class="nation-content">' +
                        '<h4>' + escapeHtml(country.name) + '</h4>' +
                        '<div class="nation-stats">' +
                        '<span><svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 4v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7l9-4z"></path><path d="M12 3v18"></path><path d="M7 7h10"></path><path d="M7 11h10"></path></svg> ' + formatNumber(country.territory_size) + ' ' + (document.body.classList.contains('lang-zh') ? '区块' : 'chunks') + '</span>' +
                        '</div>' +
                        '</div>';
                    
                    countryListElement.appendChild(card);
                });
            }
        })
        .catch(function(error) {
            console.error('Failed to fetch nation list:', error);
            // API 暂时不可用时显示默认内容
            if (heroNationCountElement) {
                heroNationCountElement.textContent = '--';
            }
        });
}

// 格式化数字（添加千位分隔符）
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

// HTML转义函数
function escapeHtml(text) {
    var div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// 开服时间实时计算（从2025年8月9日开始）
function initUptime() {
    var uptimeElement = document.getElementById('server-uptime');
    var heroUptimeElement = document.getElementById('hero-uptime');
    
    // 开服时间：2025年8月9日
    var startDate = new Date('2025-08-09T00:00:00');
    
    function updateUptime() {
        var now = new Date();
        var diff = now - startDate;
        var lang = document.body.classList.contains('lang-zh') ? 'zh' : 'en';
        
        if (diff < 0) {
            // 如果当前时间早于开服时间，显示倒计时
            var daysUntil = Math.ceil(Math.abs(diff) / (1000 * 60 * 60 * 24));
            var countdownText = lang === 'zh' ? '还有 ' + daysUntil + ' 天开服' : 'Opens in ' + daysUntil + ' days';
            if (uptimeElement) uptimeElement.textContent = countdownText;
            if (heroUptimeElement) heroUptimeElement.textContent = countdownText;
            return;
        }
        
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        
        // 状态栏显示格式
        if (uptimeElement) {
            if (lang === 'zh') {
                uptimeElement.textContent = days + '天 ' + hours + '小时 ' + minutes + '分';
            } else {
                uptimeElement.textContent = days + 'd ' + hours + 'h ' + minutes + 'm';
            }
        }
        
        // Hero区域显示格式（简化）
        if (heroUptimeElement) {
            if (lang === 'zh') {
                heroUptimeElement.textContent = days + '天+';
            } else {
                heroUptimeElement.textContent = days + 'd+';
            }
        }
    }
    
    updateUptime();
    // 每分钟更新一次
    setInterval(updateUptime, 60000);
}

// ==================== 悬浮标题框组件 ====================
function initFloatingTitleBox() {
    var floatingBox = document.querySelector('.floating-title-box');
    var closeBtn = document.querySelector('.floating-title-box .close-btn');
    
    if (!floatingBox) return;
    
    // 检查用户是否之前关闭过
    var isClosed = localStorage.getItem('floatingTitleBoxClosed');
    var closedTime = localStorage.getItem('floatingTitleBoxClosedTime');
    
    // 如果24小时内关闭过，不再显示
    if (isClosed && closedTime) {
        var hoursSinceClosed = (Date.now() - parseInt(closedTime)) / (1000 * 60 * 60);
        if (hoursSinceClosed < 24) {
            floatingBox.style.display = 'none';
            return;
        }
    }
    
    // 页面加载后延迟显示
    setTimeout(function() {
        floatingBox.classList.add('visible');
    }, 1000);
    
    // 点击关闭按钮
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            floatingBox.classList.remove('visible');
            localStorage.setItem('floatingTitleBoxClosed', 'true');
            localStorage.setItem('floatingTitleBoxClosedTime', Date.now().toString());
        });
    }
    
    // 点击内容区域跳转（如果有链接）
    var content = floatingBox.querySelector('.floating-content');
    if (content && content.dataset.href) {
        content.addEventListener('click', function() {
            window.location.href = content.dataset.href;
        });
    }
}

// ==================== 滚动效果 ====================
function initScrollEffects() {
    var scrollToTopBtn = document.querySelector('.scroll-to-top');
    var lastScrollTop = 0;
    var ticking = false;
    
    function updateScrollEffects() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // 显示/隐藏返回顶部按钮
        if (scrollToTopBtn) {
            if (scrollTop > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }
        
        // 导航栏隐藏/显示效果
        var siteHeader = document.querySelector('.site-header');
        if (siteHeader && window.innerWidth > 768) {
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // 向下滚动 - 隐藏导航栏
                siteHeader.style.transform = 'translateY(-100%)';
            } else {
                // 向上滚动 - 显示导航栏
                siteHeader.style.transform = 'translateY(0)';
            }
        }
        
        lastScrollTop = scrollTop;
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    });
    
    // 返回顶部按钮点击事件
    if (scrollToTopBtn) {
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// ==================== 平滑滚动 ====================
function initSmoothScroll() {
    var links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            var targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                
                var headerOffset = 80;
                var elementPosition = targetElement.getBoundingClientRect().top;
                var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ==================== 导航栏滚动效果 ====================
function initNavbarScroll() {
    var siteHeader = document.querySelector('.site-header');
    if (!siteHeader) return;
    
    function updateNavbar() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', updateNavbar);
    updateNavbar(); // 初始检查
}

// ==================== 元素渐入动画 ====================
function initRevealAnimations() {
    var revealElements = document.querySelectorAll('.reveal, .feature-card, .nation-card, .timeline-item, .join-card');
    
    if (!revealElements.length) return;
    
    var revealObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    revealElements.forEach(function(el, index) {
        el.style.transitionDelay = (index * 0.05) + 's';
        revealObserver.observe(el);
    });
}

// ==================== 触摸设备优化 ====================
function initTouchOptimizations() {
    // 检测触摸设备
    var isTouchDevice = window.matchMedia('(pointer: coarse)').matches;
    
    if (isTouchDevice) {
        document.body.classList.add('touch-device');
        
        // 优化触摸反馈
        var interactiveElements = document.querySelectorAll('a, button, .btn, .feature-card, .nation-card');
        interactiveElements.forEach(function(el) {
            el.addEventListener('touchstart', function() {
                this.classList.add('touch-active');
            }, { passive: true });
            
            el.addEventListener('touchend', function() {
                var self = this;
                setTimeout(function() {
                    self.classList.remove('touch-active');
                }, 100);
            }, { passive: true });
        });
    }
}

// ==================== Hero 数字计数动画 ====================
function initHeroCounter() {
    var statValues = document.querySelectorAll('.hero-stat-value[data-count]');
    if (!statValues.length) return;

    var countObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var target = parseInt(el.getAttribute('data-count'), 10);
                var suffix = el.getAttribute('data-suffix') || '';
                var duration = 1500;
                var start = 0;
                var startTime = null;

                function animate(currentTime) {
                    if (!startTime) startTime = currentTime;
                    var progress = Math.min((currentTime - startTime) / duration, 1);
                    var easeOut = 1 - Math.pow(1 - progress, 3);
                    var current = Math.floor(easeOut * target);
                    el.textContent = current + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        el.textContent = target + suffix;
                    }
                }

                requestAnimationFrame(animate);
                countObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    statValues.forEach(function(el) {
        countObserver.observe(el);
    });
}

// ==================== 视差滚动效果 ====================
function initParallaxEffects() {
    var parallaxElements = document.querySelectorAll('.hero-section, .cta-section');
    if (!parallaxElements.length) return;

    var ticking = false;

    function updateParallax() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        parallaxElements.forEach(function(el) {
            var rect = el.getBoundingClientRect();
            var speed = 0.3;
            var offset = scrollTop * speed;

            if (rect.top < window.innerHeight && rect.bottom > 0) {
                var beforeEl = el.querySelector('::before');
                if (beforeEl) {
                    beforeEl.style.transform = 'translateY(' + offset + 'px)';
                }
            }
        });

        ticking = false;
    }

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(updateParallax);
            ticking = true;
        }
    });
}

// ==================== 卡片 3D 倾斜效果 (桌面端) ====================
function initCardTilt() {
    var cards = document.querySelectorAll('.feature-card, .mode-card, .hub-card');
    if (!cards.length) return;

    // 仅在非触摸设备启用
    if (window.matchMedia('(pointer: coarse)').matches) return;

    cards.forEach(function(card) {
        card.addEventListener('mousemove', function(e) {
            var rect = card.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            var centerX = rect.width / 2;
            var centerY = rect.height / 2;
            var rotateX = (y - centerY) / 20;
            var rotateY = (centerX - x) / 20;

            card.style.transform = 'perspective(1000px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            card.style.transform = '';
        });
    });
}
