<?php

return [

    // Default Cache Stores Name
    'default' => env('cache.default', 'file'),

    // Cache Stores Options
    'stores'  => [

        'file' => [
            'driver'    => 'file',
            'directory' => storage_path('cache')
        ],

        'redis' => [
            'driver'   => 'redis',
            'host'     => env('cache.redis.host', '127.0.0.1'),
            'port'     => env('cache.redis.port', '6379'),
            'password' => env('cache.redis.password', ''),
            'database' => env('cache.redis.database', 0),
        ],
    ],

];