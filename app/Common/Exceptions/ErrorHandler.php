<?php

namespace App\Common\Exceptions;

use App\Common\Constant\StatusCode;
use App\Common\Constant\Utterance;
use App\Common\Traits\Response as ResponseTrait;
use Gino\Yaf\Kernel\App;
use \Gino\Yaf\Kernel\Exception\ErrorHandler as KernelErrorHandler;
use Gino\Yaf\Kernel\Exception\MiddlewareBreakOff;
use Gino\Yaf\Kernel\Log;
use \Gino\Yaf\Kernel\Response;

class ErrorHandler extends KernelErrorHandler {

    use ResponseTrait;

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
        parent::exception($ex);

        try {
            if (App::response()->getCode() == Response::S500_INTERNAL_SERVER_ERROR) {
                (new static())->respJson(null, StatusCode::EXCEPTION, __(Utterance::SERVER_ERROR));
            }
            static::renderException($ex);
        } catch (\Throwable $e) {
            static::record($e);
        }
    }

    /**
     * @param \Throwable $ex
     */
    public static function renderException(\Throwable $ex) {
        // 自动输出
        if ($ex instanceof AbstractAutoDisplayException) {
            $ex->render();
        }
    }


    /**
     * @inheritDoc
     */
    public static function pageNotFound(string $page) {
        parent::pageNotFound($page);
        // 替换文字
        (new static())->respJson(null, StatusCode::EXCEPTION, __(Utterance::PAGE_NOT_FOUND));
    }


}