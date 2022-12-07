<?php
define("APPLICATION_PATH", dirname(dirname(__FILE__)));

include APPLICATION_PATH . '/vendor/autoload.php';

$app = new \Yaf\Application(config('yaf'));
$app->bootstrap()->run();