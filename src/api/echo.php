<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

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

