<?php

namespace App\Models;

use CodeIgniter\Model;

class TindakanModel extends Model
{
    protected $table = 'tindakan';
    protected $allowedFields = [
        'id', 'keadaan_umum', 'temp', 'tekanan_darah',
        'jml_nafas', 'denyut_jantung', 'deskripsi', 'subjektif',
        'objektif', 'id_perawat', 'id_pasien', 'id_assessment', 'id_plan', 'id_dokter'
    ];
    public function delete_by_id($id)
    {
        $db = \Config\Database::connect();
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        $db->query("alter table tindakan auto_increment = 0");
        $db->query("alter table jadwal auto_increment = 0");
        $db->query("alter table gcs auto_increment = 0");
        return $query;
    }
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
    function search($id)
    {
        return $this->tindakanJoin(true, 'tindakan.id', $id);
    }
    function byRuangan($id)
    {
        return $this->where('id_ruangan', $id)->findAll();
    }
    function age($data)
    {
        $age = date_diff(date_create($data->tanggal_lahir), date_create('now'))->y;
        $data->age = $age;
        return $data;
    }
    function pre($data)
    {
        if ($data->jml_nafas != null && $data->temp && $data->denyut_jantung) {
            $nfs = explode('-', $data->jml_nafas, 2);
            $temp = explode('-', $data->temp, 2);
            $dnyt = explode('-', $data->denyut_jantung, 2);
            if (sizeof($nfs) > 1) {
                $data->deskripjml_nafas = $nfs[1];
            }
            if (sizeof($temp) > 1) {
                $data->deskriptemp = $temp[1];
            }
            if (sizeof($dnyt) > 1) {
                $data->deskrippulse = $dnyt[1];
            }
            $data->temp = $temp[0];
            $data->jml_nafas = $nfs[0];
            $data->denyut_jantung = $dnyt[0];
        }
        return $data;
    }
    function exp($data)
    {
        if ($data->tekanan_darah != null) {
            $exp = explode('/', $data->tekanan_darah, 2);
            $data->sistolik = $exp[0];
            $data->diastolik = $exp[1];
        }
        return $data;
    }
    function tindakanJoin($search = false, $column = null, $data = null)
    {
        $select = "tindakan.id, `assessment`.`assessment`, pasien.id as id_pasien, perawat.id as id_perawat, shif.id as id_shif, jadwal.id as id_jadwal, gcs.id as id_gcs, tindakan.jml_nafas, `assessment`.id as no_assessment ,perawat.no_registrasi as username,  (SELECT DATE_FORMAT(shif.tanggal,'%d-%m-%Y'))AS tanggal, shif.keterangan AS shif, ruangan.nama_ruangan AS ruangan, kategori.kategori, tindakan.keadaan_umum, tindakan.temp ,gcs.eye as eye ,gcs.verba as verba, gcs.motorik as motorik , tindakan.tekanan_darah, tindakan.denyut_jantung, tindakan.deskripsi , tindakan.subjektif, tindakan.objektif, 
      perawat.nama AS perawat, pasien.nomor_mr AS nomor_mr, pasien.nama AS pasien, (SELECT DATE_FORMAT(pasien.tanggal_lahir ,'%d-%m-%Y')) AS tanggal_lahir ,pasien.jenis_kelamin AS jenis_kelamin, pasien.tinggi_badan AS tinggi_badan, pasien.berat_badan AS berat_badan, plan.planning, plan.id as no_plan, pasien.diagnosa_medis AS diagnosa_medis ,pasien.status , dokter.nama AS dokter , tindakan.id_dokter as tindakan_dokter ,pasien.id_dokter as pasien_dokter";
        if (!$search) {
            $this->select($select);
            $this->join('perawat', "tindakan.id_perawat = perawat.id");
            $this->join('pasien', "tindakan.id_pasien = pasien.id");
            $this->join('jadwal', "tindakan.id = jadwal.id_tindakan");
            $this->join('shif', "jadwal.id_shif = shif.id");
            $this->join('ruangan', "pasien.id_ruangan = ruangan.id");
            $this->join('kategori', "ruangan.id = kategori.id_ruangan");
            $this->join('dokter', "pasien.`id_dokter` = dokter.id");
            $this->join('gcs', "tindakan.`id` = gcs.id_tindakan", 'left');
            $this->join('assessment', "tindakan.`id_assessment` = assessment.id", 'left');
            $this->join('plan', "tindakan.`id_plan` = plan.id", 'left');
            $this->having('username', $data);
            $query = $this->get();
            return $query->getResult();
        } else {
            $this->select($select);
            $this->join('perawat', "tindakan.id_perawat = perawat.id");
            $this->join('pasien', "tindakan.id_pasien = pasien.id");
            $this->join('jadwal', "tindakan.id = jadwal.id_tindakan");
            $this->join('shif', "jadwal.id_shif = shif.id");
            $this->join('ruangan', "pasien.id_ruangan = ruangan.id");
            $this->join('kategori', "ruangan.id = kategori.id_ruangan");
            $this->join('dokter', "pasien.`id_dokter` = dokter.id");
            $this->join('gcs', "tindakan.`id` = gcs.id_tindakan", 'left');
            $this->join('assessment', "tindakan.`id_assessment` = assessment.id", 'left');
            $this->join('plan', "tindakan.`id_plan` = plan.id", 'left');
            $this->having($column, $data);
            $query = $this->get();
            return $query->getResult()[0];
        }
    }
}
