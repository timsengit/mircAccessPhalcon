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
