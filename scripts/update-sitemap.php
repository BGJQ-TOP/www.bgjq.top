<?php
/**
 * Sitemap 自动更新脚本
 * 
 * 此脚本应每天运行一次，用于：
 * 1. 触发 sitemap 缓存更新
 * 2. 提交 sitemap 到搜索引擎
 * 3. 记录更新日志
 * 
 * 使用方法：
 * php scripts/update-sitemap.php
 * 
 * Cron 配置示例（Linux）：
 * 0 2 * * * cd /path/to/www.bgjq.top && php scripts/update-sitemap.php >> logs/sitemap-update.log 2>&1
 * 
 * Windows 任务计划程序：
 * 创建基本任务，每天 2:00 执行：
 * php.exe d:\编程\Web\www.bgjq.top\scripts\update-sitemap.php
 */

define('APP_PATH', dirname(__DIR__));
define('CONFIG_PATH', APP_PATH . '/config');
define('STORAGE_PATH', APP_PATH . '/storage');
define('LOG_PATH', STORAGE_PATH . '/logs');

// 加载核心文件
require_once APP_PATH . '/app/core/Config.php';
require_once APP_PATH . '/app/core/Database.php';
require_once APP_PATH . '/app/services/IndexNowService.php';

// 初始化数据库连接
try {
    $config = Config::getInstance();
    $dbConfig = [
        'host' => $config->get('database.host'),
        'port' => $config->get('database.port'),
        'database' => $config->get('database.database'),
        'username' => $config->get('database.username'),
        'password' => $config->get('database.password'),
        'charset' => $config->get('database.charset'),
    ];
    
    Database::connect($dbConfig);
} catch (Exception $e) {
    // 记录数据库连接失败，但继续执行
    error_log("Database connection failed: " . $e->getMessage());
}

// 确保日志目录存在
if (!is_dir(LOG_PATH)) {
    @mkdir(LOG_PATH, 0755, true);
}

echo "[" . date('Y-m-d H:i:s') . "] 开始更新 Sitemap...\n";

try {
    $baseUrl = 'https://www.bgjq.top';
    
    // 1. 触发 sitemap 更新（通过访问 sitemap 索引）
    echo "正在刷新 sitemap 缓存...\n";
    
    $sitemapUrl = $baseUrl . '/sitemap.xml';
    $result = file_get_contents($sitemapUrl);
    
    if ($result !== false) {
        echo "✓ Sitemap 索引刷新成功\n";
    } else {
        throw new Exception("无法访问 sitemap 索引");
    }
    
    // 2. 获取所有子 sitemap 并刷新
    $sitemapTypes = ['pages', 'music', 'video', 'worldview', 'nations', 'announcements'];
    
    foreach ($sitemapTypes as $type) {
        $url = $baseUrl . '/sitemap-' . $type . '.xml';
        $result = file_get_contents($url);
        
        if ($result !== false) {
            echo "✓ Sitemap-{$type} 刷新成功\n";
        } else {
            echo "✗ Sitemap-{$type} 刷新失败\n";
        }
    }
    
    // 3. 提交到 IndexNow
    echo "\n正在提交到 IndexNow...\n";
    
    $indexnow = indexnow();
    $submittedCount = 0;
    
    // 提交主要页面 URL
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
    
    foreach ($mainPages as $page) {
        $results = $indexnow->submitBilingual($baseUrl . $page);
        
        if ($results['zh']['success']) {
            $submittedCount++;
        }
        if ($results['en']['success']) {
            $submittedCount++;
        }
    }
    
    echo "✓ 成功提交 {$submittedCount} 个 URL 到 IndexNow\n";
    
    // 4. 记录更新日志
    $logMessage = sprintf(
        "[%s] Sitemap 更新完成 - 刷新了 %d 个子 sitemap，提交了 %d 个 URL 到 IndexNow\n",
        date('Y-m-d H:i:s'),
        count($sitemapTypes) + 1,
        $submittedCount
    );
    
    $logFile = LOG_PATH . '/sitemap-update.log';
    
    file_put_contents($logFile, $logMessage, FILE_APPEND);
    
    echo "\n" . $logMessage;
    echo "[" . date('Y-m-d H:i:s') . "] Sitemap 更新完成！\n";
    
} catch (Exception $e) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] 错误：" . $e->getMessage() . "\n";
    echo $errorMessage;
    
    $logFile = LOG_PATH . '/sitemap-update.log';
    file_put_contents($logFile, $errorMessage, FILE_APPEND);
    
    exit(1);
}
