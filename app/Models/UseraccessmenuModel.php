<?php

namespace App\Models;

use CodeIgniter\Model;

class UseraccessmenuModel extends Model
{
    protected $table = 'Useraccessmenu';
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
