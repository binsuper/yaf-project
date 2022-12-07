<?php

use \App\Common\Controller\Controller;

class IndexController extends Controller {

    /**
     * 上报用户行为事件
     */
    public function indexAction() {
        $this->respJson('this is yaf project');
    }

}