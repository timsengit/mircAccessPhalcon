<?php
/**
 * 公用controller，除了index其他页面不需要登录，切记此controller中的action为非必须登录action
 */
namespace MyApp\Controllers\Admin;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getViewsDir() . '/admin/');
    }

    protected function initialize()
    {

    }

}
