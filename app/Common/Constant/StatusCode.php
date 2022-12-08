<?php

namespace App\Common\Constant;

/**
 * 响应状态码
 */
class StatusCode {

    const EXCEPTION = -1;                                   // 未知异常
    const SUCCESS   = 0;                                    // 成功
    const FAILED    = 1;                                    // 失败

    // 1 校验层
    const TIME_EXPIRED     = 1000;                           // 时间过期
    const SIGNATURE_FAILED = 1001;                           // 验签失败
    const ACCESS_DENY      = 1002;                           // 禁止访问，无权限

}