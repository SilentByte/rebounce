<?php

return [
    'settings' => [
        'displayErrorDetails' => ((bool)$_ENV['DEBUG']),
        'addContentLengthHeader' => false,

        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'use_cache' => !((bool)$_ENV['DEBUG']),
            'cache_path' => __DIR__ . '/../.cache/',
        ],

        'logger' => [
            'name' => 'rebounce',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
