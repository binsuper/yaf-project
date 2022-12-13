<?php

namespace App\Common\Middleware;

use Closure;
use Gino\Yaf\Kernel\App;
use Gino\Yaf\Kernel\Log;
use Gino\Yaf\Kernel\Request;

class AccessLog extends AbstractMiddleware {

    /**
     * @inheritDoc
     */
    public function handler(Request $request, Closure $next) {
        Log::channel('access')->info('[request]', [
            'uri'    => $request->getRequestPath(),
            'ip'     => $request->getClientIps(),
            'query'  => $request->query(),
            'post'   => $request->post(),
            'body'   => $request->rawBody(),
            'header' => $request->headers()
        ]);

        $next();
    }

    /**
     * @inheritDoc
     */
    public function shutdown(Request $request, Closure $next) {
        Log::channel('access')->info('[response]' . $this->response()->getBody(), ['code' => $this->response()->getCode()]);

        $next();
    }

    /**
     * record response
     *
     * @throws \Gino\Phplib\Error\BadConfigurationException
     */
    public static function record() {
        Log::channel('access')->info('[response] ' . App::response()->getBody(), ['code' => App::response()->getCode()]);
    }

}