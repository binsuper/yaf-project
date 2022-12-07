<?php

return [

    // 中间件
    'middlewares' => [
        'example' => \App\Middleware\VerifySignExample::class
    ],

    // 签名驱动
    'signature'   => [
        'json' => \Gino\Phplib\Signature\FulltextSignature::class,
        'dict' => \Gino\Phplib\Signature\DictionarySignature::class,
    ]

];