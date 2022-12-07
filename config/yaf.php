<?php
return [
    'application' => [
        'directory'  => APPLICATION_PATH . '/app/',
        'dispatcher' => [
            'throwException' => 1,
            'catchException' => 0, // 分发请求时是否捕捉异常
        ],
        'modules'    => 'Index'
    ],
];