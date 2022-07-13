<?php

namespace App\Models;

use CodeIgniter\Model;

class ShiftModel extends Model
{
    protected $table = 'shif';
    protected $allowedFields = ['id', 'tanggal', 'keterangan', 'id_perawat'];
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
    function search($column, $data)
    {
        return $this->where($column, $data)->first();
    }
    function checker($data)
    {
        $this->select("*");
        $this->where('tanggal', $data['tgl']);
        $this->where('keterangan', $data['jaga']);
        $this->where('id_perawat', $data['perawat']);
        $query = $this->get();
        return $query->getResult();
    }
    function shiftJoin($column = null, $data = null, $row = false, $search = false)
    {
        $this->select("shif.id, shif.tanggal, shif.keterangan, perawat.`nama` AS perawat , perawat.id AS id_perawat ,ruangan.id as ruangan");
        $this->join('perawat', "shif.id_perawat = perawat.id");
        $this->join('ruangan', "perawat.`id_ruangan` = ruangan.id");
        if ($search) {
            $this->having($column, $data);
            if ($row) {
                $query = $this->get();
                return $query->getResult()[0];
            } else {
                $query = $this->get();
                return $query->getResult();
            }
        } else {
            $query = $this->get();
            return $query->getResult();
        }
    }
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table shif auto_increment = 0");
        return $query;
    }
}
