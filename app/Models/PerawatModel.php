<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatModel extends Model
{
    protected $table = 'Perawat';
    protected $allowedFields = ['id', 'no_registrasi', 'nama', 'alamat', 'no_telp', 'status', 'id_user', 'id_ruangan'];
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('perawat');
    }
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table perawat auto_increment = 0");
        return $query;
    }
    function prep()
    {
        return $this->findAll();
    }
    function byRuangan($id)
    {
        return $this->where('id_ruangan', $id)->findAll();
    }
    function search($id)
    {
        $data = $this->where(['id' => $id])->first();
        $data['ruangan'] = $this->ruangan($data['id_ruangan']);
        return $data;
    }
    function search2($column, $param)
    {
        $data = $this->where($column, $param)->first();
        return $data;
    }
    function ruangan($id)
    {
        $ruanganModel = new RuanganModel();
        $data = $ruanganModel->search('id', $id);
        return $data['nama_ruangan'];
    }
    function cek($id)
    {
        $sql = "SELECT * FROM perawat WHERE no_registrasi = ?";
        $query = $this->query($sql, $id);
        return $query->resultID;
    }
    function edit_column($ref_column, $ref_data, $set_column, $set_data)
    {
        $this->set($set_column, $set_data);
        $this->where($ref_column, $ref_data);
        $query = $this->update();
        return $query;
    }
}
