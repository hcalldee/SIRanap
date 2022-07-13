<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\RuanganModel;

class PasienModel extends Model
{
    protected $table = 'Pasien';
    protected $allowedFields = ['id', 'nomor_mr', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'status', 'diagnosa_medis', 'alamat', 'id_ruangan', 'id_kategori', 'id_dokter', 'tgl_masuk'];

    function prep()
    {
        $data = $this->findAll();
        $data = $this->age($data);
        $data = $this->jk($data);
        return $data;
    }
    function count($id)
    {
        $sql = "SELECT * FROM pasien WHERE id_kategori = ?";
        $query = $this->query($sql, $id);
        return $query->resultID;
    }
    function pasienByruangan($id)
    {
        return $this->where('id_ruangan', $id)->findAll();
    }
    function pasienBykategori($id)
    {
        return $this->where('id_kategori', $id)->findAll();
    }
    function pasienBykategoriperempuan($id)
    {
        $this->where('id_kategori', $id);
        $this->where('jenis_kelamin', 'Perempuan');
        return $this->findAll();
    }
    function pasienBykategorilaki($id)
    {
        $this->where('id_kategori', $id);
        $this->where('jenis_kelamin', 'Laki Laki');
        return $this->findAll();
    }
    function sim($id)
    {
        $sql = "SELECT * FROM pasien WHERE nomor_mr = ?";
        $query = $this->query($sql, $id);
        return $query->resultID;
    }

    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table pasien auto_increment = 0");
        return $query;
    }

    function search($id)
    {
        $data = $this->where(['id' => $id])->first();
        $data = $this->age($data, true);
        $data['ruangan'] = $this->ruangan($data['id_ruangan']);
        return $data;
    }

    function search2($column, $data, $row = true, $column1 = null, $data2 = null)
    {
        if ($row) {
            return $this->where($column, $data)->first();
        } else {
            return $this->where($column, $data)->findAll();
        }
    }

    function now($data)
    {
        $data['hari_rawat'] = round(
            (strtotime(date_create('now')->format('Y-m-d')) - strtotime(date_create($data['tgl_masuk'])->format('Y-m-d')))
                / (60 * 60 * 24)
        );
        return $data;
    }

    function byRuangan($id)
    {
        $data = $this->where('id_ruangan', $id)->findAll();
        $data = $this->age($data);
        return $data;
    }

    function ruangan($id)
    {
        $ruanganModel = new RuanganModel();
        $data = $ruanganModel->search('id', $id);
        return $data['nama_ruangan'];
    }

    function age($data, $search = false)
    {
        $i = 0;
        if (!$search) {
            foreach ($data as $d) {
                $age = date_diff(date_create($d['tanggal_lahir']), date_create('now'))->y;
                $data[$i]['age'] = $age;
                $i++;
            }
        } else {
            $age = date_diff(date_create($data['tanggal_lahir']), date_create('now'))->y;
            $data['age'] = $age;
        }
        return $data;
    }

    function jk($data)
    {
        $i = 0;
        foreach ($data as $d) {
            if ($d['jenis_kelamin'] == 'Laki-laki') {
                $data[$i]['jenis_kelamin'] = 'L';
            } else {
                $data[$i]['jenis_kelamin'] = 'P';
            }
            $i++;
        }
        return $data;
    }
}
