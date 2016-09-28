<?php
namespace MyApp\Controllers\Admin;

use MyApp\Controllers\Admin\BaseController;
use MyApp\Library\MyPaginator;
use MyApp\Models\Access;
use MyApp\Models\Group;

class GroupController extends BaseController
{
    public function listAction()
    {

        //分页查询
        $group          = new Group();
        $currentPage    = $this->request->get('pagination', 'int', 1); //当前页
        $pageSize       = 6;
        $offset         = $pageSize * ($currentPage - 1); //偏移量
        $conut          = $group->count(''); //查询总数
        $where["LIMIT"] = [$offset, $pageSize];
        $groups         = $group->getGroupsWhere($where);
//        select('*', $where["LIMIT"]);

        $page = new MyPaginator($conut, $pageSize); //新建分页对象
        //echo 1111111111111;die;
        $this->view->setVar('groups', $groups);
        $this->view->setVar('page', $page->showpage());
    }
    public function addAction()
    {
        $access = (new Access())->select('*', []);
        // var_dump($access);die;
        $this->view->setVar('access', $access);

    }
    //保存添加用户组
    public function saveAction()
    {
        $request      = $this->request;
        $name         = $request->getPost('name');
        $access       = $request->getPost('access');
        $accessInsert = implode('-', $access);
        //var_dump($accessInsert);die;
        $this->db->insert('group',
            ['groupName' => $name,
                'access'     => $accessInsert,
            ]);
        $this->response->redirect("/admin/group/list");
    }

}
