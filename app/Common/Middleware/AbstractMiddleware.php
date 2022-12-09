<?php

namespace App\Common\Middleware;

use App\Common\Traits\Response;
use Closure;
use Gino\Yaf\Kernel\Exception\MiddlewareBreakOff;
use Gino\Yaf\Kernel\Middleware\IMiddleware;
use Gino\Yaf\Kernel\Request;

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

    /**
     * 完结阶段
     *
     * @param Request $request
     * @param Closure $next
     */
    public function shutdown(Request $request, Closure $next) {
        $next();
    }


}