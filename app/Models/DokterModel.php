<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $allowedFields = ['id', 'nama', 'no_telp', 'alamat', 'id_spesialis'];
    function prep()
    {
        $data = $this->findAll();
        $data = $this->spesialis($data);
        return $data;
    }
    function spesialis($data)
    {
        $spesialis = new SpesialisModel();
        $i = 0;
        foreach ($data as $s) {
            $dat =  $spesialis->where(['id' => $s['id_spesialis']])->first();
            $data[$i]['spesialis'] = $dat['nama'];
            $i++;
        }
        return $data;
    }
    function search($column, $data, $row = true)
    {
        if ($row) {
            return $this->where($column, $data)->first();
        } else {
            return $this->where($column, $data)->findAll();
        }
    }
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table dokter auto_increment = 0");
        return $query;
    }
}
