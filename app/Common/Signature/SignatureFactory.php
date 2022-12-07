<?php

namespace App\Common\Signature;

use Gino\Yaf\Kernel\Exception\BadConfigurationException;
use Gino\Yaf\Kernel\App;
use Gino\Phplib\Signature\ISignature;

class SignatureFactory {

    const CONFIG_PATH = 'kernel.signature.';

    /**
     * 创建签名实例
     *
     * @param string $type
     * @return ISignature
     * @throws BadConfigurationException
     */
    public static function make(string $type): ISignature {
        $key   = self::CONFIG_PATH . $type;
        $class = config($key, false);
        if (false === $class) {
            throw BadConfigurationException::miss($key);
        }
        return new $class();
    }

}