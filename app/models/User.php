<?php
namespace MyApp\Models;

use MyApp\Models\Model;

class User extends Model
{
    public function getSource()
    {
        return 'user';
    }

    public function getUser()
    {
        return $this->db->select('user', '*');
        // return $this->db->executeQuery("select * from USER ");

    }

    //取得管理用户组之后的用户列表
    public function getUserWithGroup()
    {
        //echo 1111;die;
        //return 22222;
        $join = [
            "[>]group" => ["groupId" => "id"],
        ];
        $where["ORDER"] = "user.id desc";
        $columns        = ["user.id", "user.phone", "user.qq", "user.status", "user.addTime", "user.name", "group.groupName", "group.access"];
        return $this->db->select("user", $join, $columns, $where);
    }
    //取得管理用户组之后的用户列表分页类limit限制
    public function getUserWithGroupWhere($wherei)
    {
        //return 22222;
        $join = [
            "[>]group" => ["groupId" => "id"],
        ];
        $where["ORDER"] = "user.id desc";
        $where["LIMIT"] = $wherei["LIMIT"];
        $columns        = ["user.id", "user.phone", "user.qq", "user.status", "user.addTime", "user.name", "group.groupName", "group.access"];
        return $this->db->select("user", $join, $columns, $where);
    }
    //取得管理用户组之后的用户列表 //按user.id搜索
    public function getUserWithGroupWhereId($wherei)
    {
        //return 22222;
        $join = [
            "[>]group" => ["groupId" => "id"],
        ];
        $where["ORDER"]   = "user.id desc";
        $where["user.id"] = $wherei['ID'];
        $columns          = ["user.id", "user.phone", "user.status", "user.qq", "user.addTime", "user.name", "group.groupName", "group.access"];
        return $this->db->select("user", $join, $columns, $where);
    }
    public function checkUser($adminName, $adminPwd)
    {
        $result = array();
        $user   = new User();
        $res    = $user->get("*", ['name' => $adminName]);
        if ($res['id'] > 0 && $res['pwd'] == $adminPwd) {
            $result['isAdmin'] = true;
            $result['info']    = $res;
        } else {
            $result['isAdmin'] = false;
            $result['info']    = array();
        }
        return $result;
    }
    public function insert($data = [])
    {
        return $this->db->insert('user', $data);
    }
}
