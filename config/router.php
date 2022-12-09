<?php

use \Gino\Yaf\Kernel\Router\RouteManager as Route;


Route::middleware('example')->get('example', 'example@index@index');


return Route::result();
