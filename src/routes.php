<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

$app->options('/{api:.+}', function(Request $request, Response $response, $args) {
    return $response;
});

$app->add(function(Request $request, Response $response, $next) {
    $response = $next($request, $response);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'index.html', [
        'title' => 'Rebounce • Online',
    ]);
});

require_once __DIR__ . '/api/ip.php';
require_once __DIR__ . '/api/echo.php';

