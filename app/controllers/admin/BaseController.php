<?php
/**
 * 公用controller，除了index其他页面不需要登录，切记此controller中的action为非必须登录action
 */
namespace MyApp\Controllers\Admin;

use MyApp\Models\Group;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    //实现控制器资源的权限管理
    public function beforeExecuteRoute($dispatcher)
    {

        // 这个方法会在每一个能找到的action前执行
        //取得该Action名称
        $ActionName = $dispatcher->getActionName();
        //取得Session信息得到用户组然后查取access字段，之后判断access字段中是否包含控制器名
        $groupId = $this->session->get("groupId");

        //echo $ActionName . $groupId;die;
        if (!self::hasAccess($groupId, $ActionName)) {
            $message = "You don't have permission of " . $ActionName;
            //$this->flash->error($message);
            //echo "<script>alert(" . $message . ")</script>";
            //die;
            $this->dispatcher->forward(array(
                'controller' => 'index',
                'action'     => 'login',
                "params"     => array('message' => $message),
            ));

            return false;
        }

    }
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
    //判断是否有该权限
    public function hasAccess($groupId, $action)
    {
        if ($action == 'login') {
            return true;
        }

        //由用户组id查询用户组信息
        $group     = new Group();
        $groupInfo = $group->getGroup(['id' => $groupId]);
        //var_dump($groupInfo);
        //echo $groupInfo[0]['access'];die;
        //var_dump($groupInfo['access']);

        if ($groupInfo[0]['access'] == 'all') {
            //echo "super";die;
            return true;
        } else if (strpos($groupInfo[0]['access'], $action)) {
            //判断权限字符串中是否包含请求的权限
            //echo $groupId . "has " . $action;die;
            return true;
        }
        //echo "false";die;
        return false;
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
