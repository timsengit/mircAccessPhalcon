<?php
namespace MyApp\Models;

use MyApp\Models\Model;

class Info extends Model
{
    public function getSource()
    {
        return 'info';
    }

    public function getInfo()
    {
        return $this->db->select('info', '*');
    }
}
