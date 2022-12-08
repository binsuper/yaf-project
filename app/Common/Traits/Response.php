<?php

namespace App\Common\Traits;

use Gino\Yaf\Kernel\App;

trait Response {

    /**
     * @return \Gino\Yaf\Kernel\Request
     */
    public function request() {
        return App::request();
    }

    /**
     * @return \Gino\Yaf\Kernel\Response
     */
    public function response() {
        return App::response();
    }

    /**
     * 输出json类型数据
     *
     * @param null $data
     * @param int $status
     * @param string $message
     */
    public function respJson($data = null, int $status = 0, string $message = 'success') {
        $data = [
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ];
        App::response()
           ->setBody(json_encode($data, JSON_UNESCAPED_UNICODE) ?: '');
    }

}