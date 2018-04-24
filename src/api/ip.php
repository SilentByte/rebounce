<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/api/ip', function(Request $request, Response $response, array $args) {
    $ip = $request->getServerParam('REMOTE_ADDR');
    return $response->withJson([
        'ip' => $ip,
    ]);
});

