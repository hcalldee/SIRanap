<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'ruangan';
    protected $allowedFields = ['id', 'nama_ruangan', 'kapasitas'];
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
    function search($column, $param, $row = true)
    {
        if ($row) {
            $data = $this->where($column, $param)->first();
        } else {
            $data = $this->where($column, $param)->findAll();
        }
        return $data;
    }
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table ruangan auto_increment = 0");
        return $query;
    }
    function count($data)
    {
        $sql = "SELECT * FROM ruangan WHERE nama_ruangan = '?' AND kapasitas = ?";
        $query = $this->query($sql, $data['ruangan'], $data['kapasitas']);
        return $query->resultID;
    }
    function getKategori($id)
    {
        $kategori = new KategoriModel();
        $res = $kategori->where('id_ruangan', $id)->findAll();
        return $res;
    }
}
