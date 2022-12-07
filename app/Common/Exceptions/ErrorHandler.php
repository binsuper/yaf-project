<?php

namespace App\Common\Exceptions;

use App\Common\Constant\StatusCode;
use App\Common\Constant\Utterance;
use App\Common\Traits\Response;
use Gino\Yaf\Kernel\App;
use \Gino\Yaf\Kernel\Exception\ErrorHandler as KernelErrorHandler;
use Gino\Yaf\Kernel\Exception\MiddlewareBreakOff;
use Gino\Yaf\Kernel\Log;

class ErrorHandler extends KernelErrorHandler {

    use Response;

    /**
     * @inheritDoc
     */
    public static function logger() {
        return Log::channel('error');
    }

    /**
     * @inheritDoc
     */
    public static function exception(\Throwable $ex) {
        try {
            static::display($ex);
            switch (get_class($ex)) {
                case MiddlewareBreakOff::class:
                    App::response()->flush();
                    break;
                default:
                    (new self())->respJson(null, StatusCode::UNKNOWN_EXCEPTION, __(Utterance::SERVER_ERROR));
                    App::response()->flush();
                    break;
            }
        } catch (\Throwable $e) {
            static::record($e);
        }

        parent::exception($ex);
    }

    /**
     * @param \Throwable $ex
     */
    public static function display(\Throwable $ex) {
        // 自动输出
        if ($ex instanceof AbstractAutoDisplayException) {
            $ex->display();
        }
    }


}