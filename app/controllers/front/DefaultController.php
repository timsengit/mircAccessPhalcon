<?php
namespace MyApp\Controllers\Front;

use MyApp\Controllers\Front\BaseController;
use MyApp\Models\Info;

class DefaultController extends BaseController
{

    public function indexAction()
    {
        $info                  = new Info;
        $where["AND"]["id[>]"] = 6;
        $data                  = $info->select("*", $where);
        var_dump($data);die;
        $this->view->setVar('company', 111);
    }

}
