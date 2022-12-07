<?php

namespace App\Common\Exceptions;

use App\Common\Traits\Response;

abstract class AbstractAutoDisplayException extends Exception {

    use Response;

    /**
     * 自动输出
     *
     * @return mixed
     */
    /**
     * @inheritDoc
     */
    public function display() {
        $this->respJson(null, $this->getCode(), $this->getMessage());
    }

}