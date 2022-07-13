<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
