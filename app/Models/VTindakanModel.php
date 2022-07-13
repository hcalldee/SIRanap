<?php

namespace App\Models;

use CodeIgniter\Model;

class VTindakanModel extends Model
{
    protected $table = 'view_tindakan';
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
    function search($id)
    {
        $data = $this->where(['id' => $id])->first();
        $data = $this->age($data);
        return $data;
    }
    function search2($col = null, $data = null, $row = true)
    {
        if ($row) {
            return $this->where($col, $data)->first();
        } else {
            return $this->where($col, $data)->findAll();
        }
    }
    function age($data)
    {
        $age = date_diff(date_create($data['tanggal_lahir']), date_create('now'))->y;
        $data['age'] = $age;
        return $data;
    }
}
