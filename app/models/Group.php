<?php
namespace MyApp\Models;

use MyApp\Models\Model;

class Group extends Model
{
    public function getSource()
    {
        return 'group';
    }

    public function getGroup($id)
    {
        return $this->db->select('group', '*', $id);
    }
    public function getGroupsWhere($wherei)
    {
        $where["ORDER"] = "group.id desc";
        $where["LIMIT"] = $wherei["LIMIT"];
        $columns        = ["group.id", "group.groupName", "group.access"];
        return $this->db->select('group', $columns, $where);
    }
    public function getGroups()
    {
        return $this->db->select('group', '*');
    }
}
