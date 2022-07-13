<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'histori';
    protected $allowedFields = [
        'id', 'tanggal', 'shif', 'ruangan',
        'kategori', 'keadaan_umum', 'temp', 'jml_nafas',
        'tekanan_darah', 'denyut_jantung', 'deskripsi', 'eye', 'verba', 'motorik',
        'subjektif', 'objektif', 'assessment', 'planning', 'no_registrasi', 'perawat',
        'nomor_mr', 'pasien', 'tanggal_lahir', 'jenis_kelamin', 'tinggi_badan',
        'berat_badan', 'diagnosa_medis', 'status', 'dokter'
    ];
    function prep()
    {
        $data = $this->findAll();
        return $data;
    }
    function search($col = null, $data = null, $row = true, $col2 = null, $data2 = null)
    {
        if ($row) {
            if (($col2 && $data2) != null) {
                $this->where($col, $data);
                $this->where($col2, $data2);
                return $this->first();
            } else {
                return $this->where($col, $data)->first();
            }
        } else {
            if (($col2 && $data2) != null) {
                $this->where($col, $data);
                $this->where($col2, $data2);
                return $this->findAll();
            } else {
                return $this->where($col, $data)->findAll();
            }
        }
    }
    function searchLike($col = null, $data = null, $row = true, $col2 = null, $data2 = null)
    {
        if ($row) {
            if (($col2 && $data2) != null) {
                $this->like($col, $data);
                $this->where($col2, $data2);
                return $this->first();
            } else {
                return $this->where($col, $data)->first();
            }
        } else {
            if (($col2 && $data2) != null) {
                $this->like($col, $data);
                $this->where($col2, $data2);
                return $this->findAll();
            } else {
                return $this->like($col, $data)->findAll();
            }
        }
    }
}
