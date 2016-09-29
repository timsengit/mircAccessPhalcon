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
    public function editAction()
    {
        $request = $this->request;
        $id      = $request->get('id');
        //echo $id;die;
        $group    = new Group();
        $groupone = $group->getGroup($id);
        //var_dump($groupone);die;

        $access = (new Access())->select('*', []);
        //var_dump($access);die;
        $this->view->setVar('group', $groupone[0]);

        $this->view->setVar('access', $access);

    }
    //保存添加用户组
    public function saveAction()
    {
        $request      = $this->request;
        $submitsubmit = $request->get('submitsubmit');
        //$submitdelete = $request->get('submitdelete');
        //打印：NULL
        //string(0) ""
        //故通过判断是否是字符串来断定提交项
        //var_dump($submitsubmit);
        //        echo "<pre>";
        //        var_dump($submitdelete);
        if (is_string($submitsubmit)) {
            //echo "submie";//提交更改
            $name         = $request->getPost('name');
            $access       = $request->getPost('access');
            $accessInsert = implode('-', $access);
            //var_dump($accessInsert);die;
            $this->db->insert('group',
                ['groupName' => $name,
                    'access'     => $accessInsert,
                ]);
            $this->response->redirect("/admin/group/list");
        } else {
            //echo "delete";//提交删除
            $group = new Group();
            $id    = $request->getPost('id');
            $group->delete(['id' => $id]);
            $this->response->redirect("/admin/group/list");
        };

    }

}
