<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

$app->options('/{routes:.+}', function($request, $response, $args) {
    return $response;
});

$app->add(function($request, $response, $next) {
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

$app->get('/api/ip', function(Request $request, Response $response, array $args) {
    $ip = $request->getServerParam('REMOTE_ADDR');
    return $response->withJson([
        'ip' => $ip,
    ]);
});

$app->post('/api/echo', function(Request $request, Response $response, array $args) {
    $headers = $request->getHeaders();
    foreach($headers as $name => $value) {
        $response = $response->withHeader("X-Echo-$name", $value);
    }

    $types = $request->getHeader('Content-Type');
    if(isset($types[0])) {
        $response = $response->withHeader('Content-Type', $types[0]);
    }

    return $response->write($request->getBody());
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($request, $response) {
    $handler = $this->notFoundHandler;
    return $handler($request, $response);
});

