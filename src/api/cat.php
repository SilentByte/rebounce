<?php

/** @noinspection PhpUnusedParameterInspection */

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Stream;

// TODO: Add more sophisticated logic.
$app->get('/api/cats/{id}', function(Request $request, Response $response, array $args) {
    $file = fopen(__DIR__ . '/../../public/assets/data/cats/0000.jpg', 'rb');
    $stream = new Stream($file);
    return $response
        ->withHeader('Content-Type', 'image/jpeg')
        ->withBody($stream);
});

