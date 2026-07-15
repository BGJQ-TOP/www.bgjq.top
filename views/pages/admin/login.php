<?php
seo()->setTitle(is_chinese() ? '管理员登录 · 邦国崛起' : 'Admin Login · BangGuo Rise');
?>

<!DOCTYPE html>
<html lang="<?php echo get_current_lang(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo seo()->getTitle(); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <style>
        /* NES 风格登录页样式 - 与网站主样式保持一致 */
        .admin-login-wrapper {
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: var(--light);
        }
        
        .admin-login-card {
            background-color: var(--white);
            border: 4px solid var(--border);
            padding: 40px;
            width: 100%;
            max-width: 480px;
            box-shadow: var(--shadow);
        }
        
        .admin-login-header {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .admin-login-header h1 {
            font-size: 20px;
            color: var(--dark);
            margin-bottom: 16px;
            font-weight: normal;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 1.5;
        }
        
        .admin-login-header p {
            color: var(--text-light);
            font-size: 12px;
            text-transform: uppercase;
        }
        
        .admin-form-group {
            margin-bottom: 24px;
        }
        
        .admin-form-group label {
            display: block;
            font-size: 12px;
            color: var(--dark);
            margin-bottom: 10px;
            font-weight: normal;
            text-transform: uppercase;
        }
        
        .admin-form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            font-size: 14px;
            transition: all 0.2s ease;
            background-color: var(--light);
            font-family: inherit;
        }
        
        .admin-form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--shadow-sm);
            background-color: var(--white);
        }
        
        .admin-form-group input::placeholder {
            color: var(--text-muted);
        }
        
        .admin-btn-login {
            width: 100%;
            padding: 16px;
            background-color: var(--primary);
            color: var(--dark);
            border: 2px solid var(--border);
            font-size: 14px;
            font-weight: normal;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 8px;
            text-transform: uppercase;
            font-family: inherit;
            box-shadow: var(--shadow-sm);
        }
        
        .admin-btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        
        .admin-btn-login:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }
        
        .admin-btn-login:disabled {
            background-color: var(--nes-gray);
            color: var(--white);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .admin-message-box {
            padding: 16px 20px;
            border: 2px solid var(--border);
            margin-bottom: 24px;
            font-size: 12px;
            display: none;
            text-align: center;
            text-transform: uppercase;
        }
        
        .admin-message-box.error {
            background-color: var(--nes-red);
            color: var(--dark);
            display: block;
        }
        
        .admin-message-box.success {
            background-color: var(--nes-green);
            color: var(--dark);
            display: block;
        }
        
        .admin-login-footer {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px solid var(--border);
        }
        
        .admin-login-footer a {
            color: var(--primary-dark);
            text-decoration: none;
            font-size: 12px;
            font-weight: normal;
            transition: color 0.2s;
            text-transform: uppercase;
        }
        
        .admin-login-footer a:hover {
            color: var(--primary);
        }
        
        @media (max-width: 480px) {
            .admin-login-card {
                padding: 28px 20px;
            }
            
            .admin-login-header h1 {
                font-size: 16px;
            }
            
            .admin-login-wrapper {
                padding: 20px 16px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="site-branding">
                <a href="/" class="logo-link">
                    <img src="/public/images/BGJQ.webp" alt="<?php echo t('site_name'); ?> Logo" class="logo-img" loading="lazy">
                </a>
            </div>
        </div>
    </header>

    <main class="site-main" style="padding-top: 72px;">
        <div class="admin-login-wrapper">
            <div class="admin-login-card">
                <div class="admin-login-header">
                    <h1><?php echo is_chinese() ? '管理员登录' : 'Admin Login'; ?></h1>
                    <p><?php echo is_chinese() ? '投稿审核管理系统' : 'Submission Review Management System'; ?></p>
                </div>
                
                <div id="admin-message-box" class="admin-message-box"></div>
                
                <form id="admin-login-form">
                    <div class="admin-form-group">
                        <label for="username"><?php echo is_chinese() ? '用户名' : 'Username'; ?></label>
                        <input type="text" id="username" name="username" required placeholder="<?php echo is_chinese() ? '请输入用户名' : 'Enter username'; ?>">
                    </div>
                    
                    <div class="admin-form-group">
                        <label for="password"><?php echo is_chinese() ? '密码' : 'Password'; ?></label>
                        <input type="password" id="password" name="password" required placeholder="<?php echo is_chinese() ? '请输入密码' : 'Enter password'; ?>">
                    </div>
                    
                    <button type="submit" class="admin-btn-login" id="admin-submit-btn">
                        <?php echo is_chinese() ? '登录' : 'Login'; ?>
                    </button>
                </form>
                
                <div class="admin-login-footer">
                    <a href="/">
                        <?php echo is_chinese() ? '返回首页' : 'Back to Home'; ?>
                    </a>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        document.getElementById('admin-login-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            const messageBox = document.getElementById('admin-message-box');
            const submitBtn = document.getElementById('admin-submit-btn');
            
            messageBox.style.display = 'none';
            messageBox.className = 'admin-message-box';
            
            submitBtn.disabled = true;
            submitBtn.textContent = '<?php echo is_chinese() ? '登录中...' : 'Logging in...'; ?>';
            
            try {
                const response = await fetch('/api/admin/login', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    messageBox.className = 'admin-message-box success';
                    messageBox.textContent = result.message;
                    messageBox.style.display = 'block';
                    
                    setTimeout(function() {
                        window.location.href = result.redirect || '/admin/dashboard';
                    }, 500);
                } else {
                    messageBox.className = 'admin-message-box error';
                    messageBox.textContent = result.message;
                    messageBox.style.display = 'block';
                }
            } catch (error) {
                messageBox.className = 'admin-message-box error';
                messageBox.textContent = '<?php echo is_chinese() ? '登录失败，请稍后重试' : 'Login failed, please try again'; ?>';
                messageBox.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = '<?php echo is_chinese() ? '登录' : 'Login'; ?>';
            }
        });
    </script>
</body>
</html>
