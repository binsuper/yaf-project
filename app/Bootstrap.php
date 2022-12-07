<?php


use App\Common\Exceptions\ErrorHandler;
use Gino\Yaf\Kernel\Bootstrap as KernelBootstrap;
use \Gino\Yaf\Kernel\Database\Manager as DB;
use \Gino\Yaf\Kernel\Cache\Manager as Cache;

class Bootstrap extends KernelBootstrap {

    protected $error_handler_class = ErrorHandler::class;

    public function _initEnv(Yaf\Dispatcher $dispatcher) {
        $dotenv = Dotenv\Dotenv::createImmutable(APPLICATION_PATH);
        $dotenv->safeLoad();

        DB::startup(config('database'));
        Cache::startup(config('cache'));
    }

    public function _initView(Yaf\Dispatcher $dispatcher) {
        //关闭模版功能
        $dispatcher->disableView();
    }

}
