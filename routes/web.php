<?php
$router = $this;

$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');

$router->get('/admin/login', 'AdminController@showLogin');
$router->post('/api/admin/login', 'AdminController@login');
$router->get('/admin/logout', 'AdminController@logout');
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/music', 'AdminController@musicList');
$router->get('/admin/video', 'AdminController@videoList');
$router->post('/api/admin/review/music', 'AdminController@reviewMusic');
$router->post('/api/admin/review/video', 'AdminController@reviewVideo');

$router->get('/music/submit', 'SubmissionController@showMusicForm');
$router->post('/api/music/submit', 'SubmissionController@submitMusic');
$router->get('/music', 'MusicController@index');
$router->get('/music/{id}', 'MusicController@show');

$router->get('/video/submit', 'SubmissionController@showVideoForm');
$router->post('/api/video/submit', 'SubmissionController@submitVideo');
$router->get('/video', 'VideoController@index');
$router->get('/video/{id}', 'VideoController@show');

$router->get('/test', 'PageController@test');
$router->get('/debug', 'PageController@debug');

// 世界观/邦国文库路由
$router->get('/worldview', 'ArchivesController@index');
$router->get('/worldview/view', 'ArchivesController@show');
$router->post('/api/worldview/refresh', 'ArchivesController@refresh');

// 旧路由重定向（保持兼容性）
$router->get('/archives', function() {
    header('Location: /worldview', true, 301);
    exit;
});
$router->get('/archives/view', function() {
    $volume_id = $_GET['volume_id'] ?? '';
    $doc_id = $_GET['doc_id'] ?? '';
    header("Location: /worldview/view?volume_id={$volume_id}&doc_id={$doc_id}", true, 301);
    exit;
});

$router->get('/nations', 'NationController@index');
$router->get('/nations/{slug}', 'NationController@show');

$router->get('/creator', 'PageController@creator');
$router->get('/creator/{id}', 'CreatorController@show');

$router->get('/announcements', 'AnnouncementController@index');
$router->get('/guide', 'PageController@guide');
$router->get('/fanworks', 'PageController@fanworks');
$router->get('/announcements/{id}', 'AnnouncementController@show');

$router->get('/about', 'PageController@about');
$router->get('/privacy', 'PageController@privacy');
$router->get('/terms', 'PageController@terms');
$router->get('/contact', 'PageController@contact');
$router->get('/copyright', 'PageController@copyright');

$router->get('/sitemap.xml', 'SitemapController@index');
$router->get('/sitemap-{type}.xml', 'SitemapController@type');

// 工具脚本路由
$router->get('/tools/update-sitemap', 'SitemapController@update');

$router->post('/api/copy-ip', 'ApiController@copyIp');
$router->post('/api/search', 'ApiController@search');
$router->get('/api/nations', 'ApiController@nations');
