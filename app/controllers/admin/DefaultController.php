<?php
namespace MyApp\Controllers\Admin;

use MyApp\Controllers\Admin\BaseController;
use MyApp\Models\Info;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        $info                  = new Info;
        $where["AND"]["id[>]"] = 6;
        $data                  = $info->select("*", $where);
        var_dump($data);
        $this->view->setVar('company', 111);
    }

}
