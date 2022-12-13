<?php

namespace App\Common\Controller;

use App\Common\Constant\StatusCode;
use App\Common\Constant\Utterance;
use App\Common\Exceptions\ValidateException;
use App\Common\Traits\Response;
use Gino\Phplib\Validation\Validator;
use Gino\Yaf\Kernel\Controller as KernelController;
use Gino\Yaf\Kernel\Log;

class Controller extends KernelController {

    use Response;

    /**
     * 校验参数
     *
     * @param array $rules
     * @param array|null $params
     * @param bool $throw
     * @return Validator|null
     * @throws ValidateException|\Gino\Phplib\Error\BadConfigurationException
     */
    public function validate(array $rules = [], ?array $params = null, bool $throw = true): ?Validator {
        if (!$params) {
            switch ($this->request()->getMethod()) {
                case 'GET':
                    $params = $this->request()->query();
                    break;
                case 'POST':
                    $params = $this->request()->post();
                    break;
                default:
                    return NULL;
            }
        }

        Log::channel('validate')->info('request validate, path: ' . $this->request()->getRequestPath(), $params);

        $validator = Validator::make($params, $rules);
        $validator->validate();
        if ($throw && $validator->fails()) {
            Log::channel('validate')->warning('validate failed', $validator->errors());
            throw new ValidateException($validator->errors(), StatusCode::FAILED, __(Utterance::REQUEST_FAILED));
        }
        return $validator;
    }

}