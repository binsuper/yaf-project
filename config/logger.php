<?php

return [
    // 默认日志通道
    'default'  => 'app',

    // 日志通道
    'channels' => [

        'app' => [
            'driver' => 'daily',
            'path'   => storage_path('logs/app.log'),
            'level'  => env('logger.app.level', 'error'),
            'days'   => 15,
        ],

        'error' => [
            'driver'   => 'daily',
            'path'     => storage_path('logs/error/error.log'),
            'level'    => env('logger.error.level', 'info'),
            'days'     => 15,
            'callback' => function ($h) {
                $h->getFormatter()->allowInlineLineBreaks(true);
            },
        ],
    ],
];