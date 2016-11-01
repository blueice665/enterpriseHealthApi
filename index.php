<?php
/**
* 网页入口文件
 */
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
$stage = getenv('APPLICATION_STAGE') ? getenv('APPLICATION_STAGE') : 'development';
if ($stage == 'production') {
    defined('JOY_DEBUG') or define('JOY_DEBUG', false);
} else {
    defined('JOY_DEBUG') or define('JOY_DEBUG', true);
}
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__DIR__));
defined('APP_PATH') or define('APP_PATH', ROOT_PATH . '/app');
define('STATIC_VERSION', '20160324');
include ROOT_PATH . '/../framework/Joy.php';
Joy::$di->get('loader')->registerNamespaces([
'Joy\Api'=>APP_PATH.'/Api',
'Joy\Library'=>APP_PATH.'/Library/',
], true);
(new \Joy\Web\Application())->run();

