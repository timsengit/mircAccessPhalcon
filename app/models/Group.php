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
    public function getGroups()
    {
        return $this->db->select('group', '*');
    }
}
