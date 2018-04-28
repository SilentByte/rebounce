<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/api/time', function(Request $request, Response $response, array $args) {
    return $response->withJson([
        'time' => date(DateTime::ATOM),
    ]);
});

