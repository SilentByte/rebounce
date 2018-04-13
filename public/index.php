<?php
if(PHP_SAPI == 'cli-server') {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if(is_file($file)) {
        return false;
    }
}

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require_once __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

require_once __DIR__ . '/../src/containers.php';
require_once __DIR__ . '/../src/routes.php';

$app->run();
