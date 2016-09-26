<?php
/**
 * 公用controller，除了index其他页面不需要登录，切记此controller中的action为非必须登录action
 */
namespace MyApp\Controllers\Admin;

use MyApp\Models\Group;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getViewsDir() . '/admin/');
    }
    //判断是否是超级用户
    public static function isSuper($id)
    {
        //由用户组id查询用户组信息
        $group     = new Group();
        $groupInfo = $group->getGroup(['id' => $id]);
        if ($groupInfo['groupName'] == 'super') {
            return true;
        }

        return false;
        //return false !== strpos($id, 'super');
    }
    //判断是否有添加权限
    public static function hasAdd($id)
    {
        //由用户组id查询用户组信息
        $group     = new Group();
        $groupInfo = $group->getGroup(['id' => $id]);
        if ($groupInfo['access'] == 'all') {
            return true;
        } else if ($groupInfo['access'] == 'add') {
            return true;
        }

        return false;
    }
    protected function initialize()
    {
        //权限判断
        $a = $this->session->get('loginerName');
        if (isset($a)) {
            return true;
        } else {
            return false;
        }

    }

}
