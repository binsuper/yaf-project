<?php

namespace App\Common\Database;


use Gino\Yaf\Kernel\Database\Model as KernelModel;
use DateTimeInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;


abstract class AbstractModel extends KernelModel {

    /*  @param DateTimeInterface $date
     *
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

}

