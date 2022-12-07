<?php

namespace App\Common\Middleware;

use App\Common\Traits\Response;
use Gino\Yaf\Kernel\Exception\MiddlewareBreakOff;
use Gino\Yaf\Kernel\Middleware\IMiddleware;

abstract class AbstractMiddleware implements IMiddleware {

    use Response;

    /**
     * 阻断执行
     *
     * @param int $code
     * @param string $reason
     */
    public function breakOff(int $code, string $reason = 'Server Error') {
        $this->respJson(null, $code, $reason);
        throw new MiddlewareBreakOff($reason, $code);
    }

}