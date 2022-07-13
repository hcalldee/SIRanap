<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $allowedFields = ['id', 'id_tindakan', 'id_shif'];
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
