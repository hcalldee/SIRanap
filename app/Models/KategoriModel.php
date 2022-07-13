<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $allowedFields = ['id', 'kategori', 'jml_bed', 'id_ruangan'];
    function prep()
    {
        $data = $this->findAll();
        $data = $this->ruangan($data);
        return $data;
    }
    function byRuangan($id)
    {
        return $this->ruangan($this->where('id_ruangan', $id)->findAll());
    }
    function search($column, $data, $row = true)
    {
        if ($row) {
            return $this->where($column, $data)->first();
        } else {
            return $this->where($column, $data)->findAll();
        }
    }
    function ruangan($data)
    {
        $ruangan = new RuanganModel();
        $i = 0;
        foreach ($data as $d) {
            $dat = $ruangan->search('id', $d['id_ruangan']);
            $data[$i]['ruangan'] = $dat['nama_ruangan'];
            $data[$i]['id_ruangan'] = $dat['id'];
            $i++;
        }
        return $data;
    }
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table kategori auto_increment = 0");
        return $query;
    }
    function count($id)
    {
        $sql = "SELECT * FROM kategori WHERE id_ruangan = ?";
        $query = $this->query($sql, $id);
        return $query->resultID;
    }
}
