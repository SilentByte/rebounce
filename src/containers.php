<?php

$container = $app->getContainer();

$container['view'] = function($c) {
    $settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['use_cache'] ? $settings['cache_path'] : false,
    ]);

    return $view;
};

$container['logger'] = function($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['notFoundHandler'] = function($c) {
    return function($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404);
    };
};

$container['notAllowedHandler'] = function($c) {
    return function($request, $response, $methods) use ($c) {
        return $c['response']
            ->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods));
    };
};

$container['phpErrorHandler'] = function($c) {
    return function($request, $response, $error) use ($c) {
        return $c['response']
            ->withStatus(500);
    };
};