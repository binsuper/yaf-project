<?php

use \Gino\Yaf\Kernel\Router\RouteCollector;


return [(function (RouteCollector $route) {

    // 监测链接回调
    $route->middleware('example')->get('example', 'example@index@index');

})];