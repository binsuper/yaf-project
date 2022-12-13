<?php

use \Monolog\Formatter\LineFormatter;

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

        'validate' => [
            'driver'   => 'daily',
            'path'     => storage_path('logs/app.log'),
            'level'    => env('logger.validate.level', 'info'),
            'days'     => 15,
            'callback' => function ($h) {
                $h->setFormatter(new LineFormatter('[%datetime%] %channel%.%level_name%: [PID.' . getmypid() . '] %message% %context% %extra%' . PHP_EOL));
                $h->getFormatter()->allowInlineLineBreaks(true);
            },
        ],

        'access' => [
            'driver'   => 'daily',
            'path'     => storage_path('logs/access/access.log'),
            'level'    => env('logger.access.level', 'info'),
            'days'     => 15,
            'callback' => function ($h) {
                $h->setFormatter(new LineFormatter('[%datetime%] %channel%.%level_name%: [PID.' . getmypid() . '] %message% %context% %extra%' . PHP_EOL));
            },
        ],
    ],
];