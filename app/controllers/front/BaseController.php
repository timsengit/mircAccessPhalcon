<?php

namespace MyApp\Controllers\Front;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{

    //跳转到views下的front
    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getViewsDir() . 'front/');
    }

}
