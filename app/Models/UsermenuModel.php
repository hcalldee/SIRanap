<?php

namespace App\Models;

use CodeIgniter\Model;

class UsermenuModel extends Model
{
    protected $table = 'usermenu';
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
