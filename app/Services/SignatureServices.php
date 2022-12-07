<?php

namespace App\Services;


class SignatureServices {

    /**
     * 验签功能是否生效
     *
     * @return bool
     * @throws \Exception
     */
    public static function isEnable(): bool {
        return (bool)config('app.signature.enable', true);
    }

}