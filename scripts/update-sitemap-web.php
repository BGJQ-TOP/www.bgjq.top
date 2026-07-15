<?php
/**
 * Sitemap 更新和 IndexNow 提交脚本（修复版）
 * 
 * 可以通过浏览器访问执行：
 * https://www.bgjq.top/scripts/update-sitemap-web.php
 */

// 设置错误显示
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('APP_PATH', dirname(__DIR__));
define('CONFIG_PATH', APP_PATH . '/config');
define('STORAGE_PATH', APP_PATH . '/storage');
define('LOG_PATH', STORAGE_PATH . '/logs');

// 确保日志目录存在
if (!is_dir(LOG_PATH)) {
    @mkdir(LOG_PATH, 0755, true);
}

// 加载核心文件
require_once APP_PATH . '/app/core/Config.php';
require_once APP_PATH . '/app/core/Database.php';
require_once APP_PATH . '/app/services/IndexNowService.php';

// 初始化数据库连接 - 直接加载数据库配置
try {
    $dbConfigFile = CONFIG_PATH . '/database.php';
    if (file_exists($dbConfigFile)) {
        $dbConfig = require $dbConfigFile;
        // 验证配置是否为数组
        if (!is_array($dbConfig)) {
            throw new Exception('Database config must be an array, got: ' . gettype($dbConfig));
        }
        // 验证必要的键是否存在
        $requiredKeys = ['host', 'database', 'username', 'password'];
        foreach ($requiredKeys as $key) {
            if (!isset($dbConfig[$key])) {
                throw new Exception('Database config missing required key: ' . $key);
            }
        }
        // 输出调试信息
        error_log("DB Config loaded: host=" . $dbConfig['host'] . ", username=" . $dbConfig['username']);
        Database::connect($dbConfig);
    } else {
        throw new Exception('Database config file not found: ' . $dbConfigFile);
    }
} catch (Exception $e) {
    $dbError = "Database connection failed: " . $e->getMessage();
    error_log($dbError);
}

// 设置响应头
header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap 更新工具 - 邦国崛起</title>
    <style>
        body {
            font-family: 'Microsoft YaHei', Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #f59e0b;
            padding-bottom: 10px;
        }
        .status {
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffc107;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border-left: 4px solid #17a2b8;
        }
        .section {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .section h2 {
            margin-top: 0;
            color: #495057;
            font-size: 18px;
        }
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
            font-size: 13px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #f59e0b;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px;
        }
        .button:hover {
            background: #d97706;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Sitemap 更新工具</h1>
        
        <?php
        $baseUrl = 'https://www.bgjq.top';
        $output = [];
        $errors = [];
        
        // 显示数据库连接错误（如果有）
        if (isset($dbError)) {
            echo '<div class="status warning">⚠ 数据库连接失败，但不影响 sitemap 刷新功能</div>';
            echo '<div class="status info">错误信息：' . htmlspecialchars($dbError) . '</div>';
        }
        
        try {
            // 1. 检查配置
            echo '<div class="section">';
            echo '<h2>1. 检查 IndexNow 配置</h2>';
            
            $config = Config::getInstance();
            $apiKey = $config->get('seo.indexnow.api_key', '');
            $enabled = $config->get('seo.indexnow.enabled', false);
            
            echo '<div class="status info">API Key: ' . (empty($apiKey) ? '未设置' : substr($apiKey, 0, 8) . '...' . substr($apiKey, -4)) . '</div>';
            echo '<div class="status info">启用状态：' . ($enabled ? '是 ✓' : '否 ✗') . '</div>';
            
            if ($enabled && !empty($apiKey)) {
                echo '<div class="status success">✓ IndexNow 已正确配置</div>';
            } else {
                echo '<div class="status error">✗ IndexNow 未正确配置</div>';
                $errors[] = 'IndexNow 配置不完整';
            }
            echo '</div>';
            
            // 2. 验证文件检查
            echo '<div class="section">';
            echo '<h2>2. IndexNow 验证文件检查</h2>';
            
            $verifyFile = APP_PATH . '/bb19952ad18747dda40ae3bbf4f4007e.txt';
            
            if (file_exists($verifyFile)) {
                $content = trim(file_get_contents($verifyFile));
                echo '<div class="status success">✓ 验证文件存在</div>';
                echo '<div class="status info">文件路径：' . htmlspecialchars($verifyFile) . '</div>';
                echo '<div class="status info">文件内容：' . htmlspecialchars($content) . '</div>';
                
                if ($content === $apiKey) {
                    echo '<div class="status success">✓ 验证文件内容与 API Key 匹配</div>';
                } else {
                    echo '<div class="status warning">⚠ 验证文件内容与 API Key 不匹配</div>';
                    echo '<div class="status info">API Key: ' . htmlspecialchars($apiKey) . '</div>';
                }
            } else {
                echo '<div class="status error">✗ 验证文件不存在</div>';
                echo '<div class="status warning">请将验证文件放置在：' . htmlspecialchars($verifyFile) . '</div>';
            }
            echo '</div>';
            
            // 3. 刷新 Sitemap
            echo '<div class="section">';
            echo '<h2>3. 刷新 Sitemap 缓存</h2>';
            
            $sitemapTypes = ['index', 'pages', 'music', 'video', 'worldview', 'nations', 'announcements'];
            $refreshedCount = 0;
            
            foreach ($sitemapTypes as $type) {
                if ($type === 'index') {
                    $url = $baseUrl . '/sitemap.xml';
                    $name = 'Sitemap 索引';
                } else {
                    $url = $baseUrl . '/sitemap-' . $type . '.xml';
                    $name = 'Sitemap-' . $type;
                }
                
                $result = @file_get_contents($url);
                
                if ($result !== false) {
                    echo '<div class="status success">✓ ' . $name . ' 刷新成功</div>';
                    $refreshedCount++;
                } else {
                    echo '<div class="status error">✗ ' . $name . ' 刷新失败</div>';
                    $errors[] = $name . ' 刷新失败';
                }
            }
            
            echo '<div class="status info">共刷新 ' . $refreshedCount . '/' . count($sitemapTypes) . ' 个 sitemap</div>';
            echo '</div>';
            
            // 4. 提交到 IndexNow
            echo '<div class="section">';
            echo '<h2>4. 提交 URL 到 IndexNow</h2>';
            
            $indexnow = indexnow();
            $submittedCount = 0;
            $failedCount = 0;
            
            $mainPages = [
                '/',
                '/music',
                '/video',
                '/worldview',
                '/nations',
                '/announcements',
                '/guide',
                '/fanworks',
                '/creator',
            ];
            
            echo '<pre>';
            foreach ($mainPages as $page) {
                $results = $indexnow->submitBilingual($baseUrl . $page);
                
                $zhStatus = $results['zh']['success'] ? '✓' : '✗';
                $enStatus = $results['en']['success'] ? '✓' : '✗';
                
                echo sprintf("%s %s (中文：%s, 英文：%s)\n", 
                    ($results['zh']['success'] || $results['en']['success'] ? '✓' : '✗'),
                    $page,
                    $zhStatus,
                    $enStatus
                );
                
                if ($results['zh']['success']) $submittedCount++;
                else $failedCount++;
                
                if ($results['en']['success']) $submittedCount++;
                else $failedCount++;
            }
            echo '</pre>';
            
            echo '<div class="status success">✓ 成功提交 ' . $submittedCount . ' 个 URL</div>';
            if ($failedCount > 0) {
                echo '<div class="status warning">⚠ 失败 ' . $failedCount . ' 个 URL（可能是网络问题）</div>';
            }
            echo '</div>';
            
            // 总结
            echo '<div class="section">';
            echo '<h2>📊 执行总结</h2>';
            echo '<div class="status info">';
            echo 'Sitemap 刷新：' . $refreshedCount . '/' . count($sitemapTypes) . ' 成功<br>';
            echo 'IndexNow 提交：' . $submittedCount . ' 个 URL 成功<br>';
            echo '错误数量：' . count($errors) . '<br>';
            echo '</div>';
            
            if (empty($errors)) {
                echo '<div class="status success"><strong>✓ 所有操作执行成功！</strong></div>';
            } else {
                echo '<div class="status error"><strong>⚠ 部分操作失败：</strong><br>';
                echo implode('<br>', $errors);
                echo '</div>';
            }
            
        } catch (Exception $e) {
            echo '<div class="status error">';
            echo '<strong>✗ 发生错误：</strong><br>';
            echo '错误信息：' . htmlspecialchars($e->getMessage()) . '<br>';
            echo '文件：' . htmlspecialchars($e->getFile()) . '<br>';
            echo '行号：' . htmlspecialchars($e->getLine());
            echo '</div>';
        }
        ?>
        
        <div class="section">
            <h2>🔗 相关链接</h2>
            <a href="<?php echo $baseUrl; ?>/sitemap.xml" class="button" target="_blank">查看 Sitemap 索引</a>
            <a href="<?php echo $baseUrl; ?>/sitemap-pages.xml" class="button" target="_blank">查看页面 Sitemap</a>
            <a href="https://www.bing.com/webmasters" class="button" target="_blank">Bing 站长工具</a>
            <a href="https://search.google.com/search-console" class="button" target="_blank">Google Search Console</a>
        </div>
        
        <div class="section">
            <h2>📝 自动更新配置</h2>
            <p>要配置每日自动更新，请使用以下命令（Windows 任务计划程序）：</p>
            <pre>php.exe d:\编程\Web\www.bgjq.top\scripts\update-sitemap.php</pre>
            <p>或使用 PowerShell 创建定时任务：</p>
            <pre>$action = New-ScheduledTaskAction -Execute "C:\php\php.exe" -Argument "d:\编程\Web\www.bgjq.top\scripts\update-sitemap.php" -WorkingDirectory "d:\编程\Web\www.bgjq.top"
$trigger = New-ScheduledTaskTrigger -Daily -At 2am
Register-ScheduledTask -TaskName "BGJQ Sitemap 每日更新" -Action $action -Trigger $trigger -Principal (New-ScheduledTaskPrincipal -UserId "SYSTEM" -LogonType ServiceAccount -RunLevelHighest)</pre>
        </div>
    </div>
</body>
</html>
