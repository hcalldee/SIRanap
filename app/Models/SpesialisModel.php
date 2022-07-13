<?php

namespace App\Models;

use CodeIgniter\Model;

class SpesialisModel extends Model
{
    protected $table = 'spesialis';
    protected $allowedFields = ['id', 'nama'];
    function prep()
    {
        $data = $this->findAll();
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
        $db->query("alter table spesialis auto_increment = 0");
        return $query;
    }
}
