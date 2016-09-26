<?php
namespace MyApp\Controllers\Front;

use MyApp\Controllers\Front\BaseController;
use MyApp\Models\Info;

class IndexController extends BaseController
{

    public function indexAction()
    {
        echo 111111111111111111;
        $info = new Info();
        var_dump($info->getInfo());
//        $info                  = new Info;
        //        $where["AND"]["id[>]"] = 6;
        //        $data                  = $info->select("*", $where);
        //        var_dump($data);die;
        //        $this->view->setVar('company', 111);
    }

}
