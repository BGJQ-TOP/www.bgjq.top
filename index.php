<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);  // 临时启用错误显示
ini_set('log_errors', 1);

define('APP_PATH', __DIR__);
define('CONFIG_PATH', APP_PATH . '/config');
define('PUBLIC_PATH', APP_PATH . '/public');
define('VIEW_PATH', APP_PATH . '/views');
define('STORAGE_PATH', APP_PATH . '/storage');
define('APP_CORE_PATH', APP_PATH . '/app/core');
define('APP_MODEL_PATH', APP_PATH . '/app/models');
define('APP_SERVICE_PATH', APP_PATH . '/app/services');
define('APP_CONTROLLER_PATH', APP_PATH . '/app/controllers');

$logPath = STORAGE_PATH . '/logs';
if (!is_dir($logPath)) {
    @mkdir($logPath, 0755, true);
}
ini_set('error_log', $logPath . '/php_error.log');

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
        error_log("Fatal Error: " . $error['message'] . " in " . $error['file'] . " on line " . $error['line']);
    }
});

require_once APP_CORE_PATH . '/Application.php';
require_once APP_CORE_PATH . '/Config.php';
require_once APP_CORE_PATH . '/Router.php';
require_once APP_CORE_PATH . '/Database.php';
require_once APP_CORE_PATH . '/View.php';
require_once APP_CORE_PATH . '/Request.php';
require_once APP_CORE_PATH . '/Response.php';
require_once APP_CORE_PATH . '/Session.php';
require_once APP_SERVICE_PATH . '/services.php';
require_once APP_CONTROLLER_PATH . '/Controller.php';

Application::run();
