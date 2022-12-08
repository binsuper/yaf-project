<?php

namespace App\Middleware;

use App\Common\Constant\StatusCode;
use App\Common\Constant\Utterance;
use App\Common\Middleware\AbstractMiddleware;
use App\Common\Signature\SignatureFactory;
use App\Services\SignatureServices;
use Gino\Yaf\Kernel\Log;
use Closure;
use Gino\Yaf\Kernel\Request;

class VerifySignExample extends AbstractMiddleware {

    /** @var \Monolog\Logger */
    protected $logger;

    public function __construct() {
        $this->logger = Log::channel();
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handler(Request $request, Closure $next) {
        $this->logger->debug('run example middleware');

        if (SignatureServices::isEnable()) {
            $secret = 'sign secret';
            $body   = $this->request()->rawBody();
            $sign   = $this->request()->get('sign');

            $signer = SignatureFactory::make('json');
            if (!$signer->setSecretKey($secret)->setContext($body)->verify($sign, $result_sign)) {
                // 签名不符
                $this->logger->info('signature is inconsistent', ['request sign' => $sign, 'actually sign' => $result_sign, 'assemble' => $signer->assemble()]);
                $this->breakOff(StatusCode::SIGNATURE_FAILED, __(Utterance::SIGNATURE_FAILED));
                return;
            }
        }

        $next();
    }

}