<?php

namespace App\Models;

use CodeIgniter\Model;

class GcsModel extends Model
{
    protected $table = 'gcs';
    protected $allowedFields = ['id', 'eye', 'verba', 'motorik', 'id_tindakan'];
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
}
