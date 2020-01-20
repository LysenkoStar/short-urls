<?php

define("DEBUG", true);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/application');
define("CORE", ROOT . '/application/core');
define("CACHE", ROOT . '/tmp/cache');
define("LIBS", ROOT . '/application/core/libs');
define("CONF", ROOT . '/config');
define("LAYOUT", 'default');

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace("/public", '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . 'admin');

require_once ROOT . '/vendor/autoload.php';