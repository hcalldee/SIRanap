<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table = 'plan';
    protected $allowedFields = ['id', 'planning'];
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
        $db->query("alter table plan auto_increment = 0");
        return $query;
    }
}
