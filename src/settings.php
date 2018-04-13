<?php
return [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,

        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'use_cache' => false,
            'cache_path' => __DIR__ . '/../.cache/',
        ],

        'logger' => [
            'name' => 'rebounce',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
