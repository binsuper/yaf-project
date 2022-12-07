<?php

return [

    // Default Database Connection Name
    'default'     => env('database.default', 'mysql'),

    // Database Connection Options
    'connections' => [

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('database.mysql.host', '127.0.0.1'),
            'port'      => env('database.mysql.port', '3306'),
            'database'  => env('database.mysql.database', 'test'),
            'username'  => env('database.mysql.username', 'root'),
            'password'  => env('database.mysql.password', '123456'),
            'charset'   => env('database.mysql.charset', 'utf8mb4'),
            'collation' => env('database.mysql.collation', 'utf8mb4_general_ci'),
            'prefix'    => env('database.mysql.prefix', ''),
            'options'   => [
                \PDO::ATTR_PERSISTENT => (bool)env('database.mysql.persistent', 0), // 持久化
            ]
        ]

    ],
];