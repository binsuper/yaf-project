<?php

namespace App\Common\Exceptions;

use Throwable;

class ValidateException extends AbstractAutoDisplayException {

    protected $errors = [];

    public function __construct(array $errors, $code = 0, $message = '', Throwable $previous = null) {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors(): array {
        return $this->errors;
    }

    /**
     * @inheritDoc
     */
    public function render() {
        $this->response()->setCode(\Gino\Yaf\Kernel\Response::S400_BAD_REQUEST);
        parent::render();
    }


}