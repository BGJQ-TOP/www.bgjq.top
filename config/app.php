<?php
return [
    'name' => '邦国崛起 IP全球化主站',
    'env' => 'production',
    'debug' => false,
    'url' => 'https://www.bgjq.top',
    'timezone' => 'Asia/Shanghai',
    'locale' => 'zh_CN',
    'key' => 'bgjq_secret_key_' . bin2hex(random_bytes(16)),
    
    'assets' => [
        'url' => '/public',
        'css_dir' => '/public/css',
        'js_dir' => '/public/js',
        'image_dir' => '/public/images',
        'upload_dir' => '/public/uploads',
    ],
    
    'pagination' => [
        'per_page' => 20,
        'num_links' => 5,
    ],
    
    'cache' => [
        'enabled' => true,
        'driver' => 'file',
        'path' => STORAGE_PATH . '/cache',
        'ttl' => 3600,
    ],
];
