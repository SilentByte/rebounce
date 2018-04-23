<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'index.html', [
        'title' => 'Rebounce • Online'
    ]);
});


$app->get('/ip', function(Request $request, Response $response, array $args) {
    $ip = $request->getServerParam('REMOTE_ADDR');
    return $response->withJson([
        'ip' => $ip
    ]);
});

