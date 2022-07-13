<?php

namespace App\Models;

use CodeIgniter\Model;

class VPModel extends Model
{
    protected $table = 'view_perawat';
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
