<?php

namespace App\Controllers\KT;

use App\Models\PasienModel;
use App\Models\KategoriModel;
use App\Models\PerawatModel;
use App\Models\DokterModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Pasien extends BaseController
{
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->perawatModel = new PerawatModel();
        $this->kategoriModel = new KategoriModel();
        $this->dokterModel = new DokterModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $pasien = $this->pasienModel->byRuangan(session()->get('ruangan'));
        $perawat = $this->perawatModel->byRuangan(session()->get('ruangan'));
        $kategori = $this->kategoriModel->byRuangan(session()->get('ruangan'));
        $dokter = $this->dokterModel->prep();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Pasien',
            'title_slug' => 'Pasien',
            'Pasien' => $pasien,
            'dokter' => $dokter,
            'perawat' => $perawat,
            'kategori' => $kategori,
            'ruangan' => $ruangan['nama_ruangan']
        ];
        if (is_null($this->role_check('Ketua Tim'))) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }

    function getPasien($id)
    {
        if ($this->request->isAJAX()) {
            $data = $this->pasienModel->search($id);
            $data = $this->pasienModel->now($data);
            return json_encode($data);
        }
    }
    function hapus($id)
    {
        if ($this->pasienModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }
    function max($data)
    {
        $kapasitas = $this->kategoriModel->search('id', $data['kategori']);
        $kapasitas = $kapasitas['jml_bed'];
        $jml_pasien = $this->pasienModel->count($data['kategori'])->num_rows + 1;
        if ($jml_pasien > $kapasitas) {
            return true;
        } else {
            return false;
        }
    }
    function create($id = null)
    {
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            if ($this->pasienModel->sim($data['nomr'])->num_rows > 0 && $id == null) {
                return json_encode('ada');
            } else {
                if ($this->max($data)) {
                    return json_encode('max');
                } else {
                    if ($id != null) {
                        $send = [
                            'id' => $id,
                            'nomor_mr' => $data['nomr'],
                            'nama' => $data['nama'],
                            'tanggal_lahir' => $data['tanggal_lahir'],
                            'jenis_kelamin' => $data['jk'],
                            'tinggi_badan' => $data['tinggi'],
                            'berat_badan' => $data['berat'],
                            'diagnosa_medis' => $data['diagnosa_medis'],
                            'alamat' => $data['alamat'],
                            'status' => $data['status'],
                            'id_kategori' => $data['kategori'],
                            'id_dokter' => $data['dokter'],
                        ];
                    } else {
                        $send = [
                            'nomor_mr' => $data['nomr'],
                            'nama' => $data['nama'],
                            'tanggal_lahir' => $data['tanggal_lahir'],
                            'jenis_kelamin' => $data['jk'],
                            'tinggi_badan' => $data['tinggi'],
                            'berat_badan' => $data['berat'],
                            'diagnosa_medis' => $data['diagnosa_medis'],
                            'alamat' => $data['alamat'],
                            'status' => $data['status'],
                            'id_ruangan' => session()->get('ruangan'),
                            'id_kategori' => $data['kategori'],
                            'id_dokter' => $data['dokter'],
                            'tgl_masuk' => date('Y-m-d'),
                        ];
                    }
                    if ($this->pasienModel->save($send)) {
                        return json_encode('berhasil');
                    }
                }
            }
        } else {
            return json_encode('kosong');
        }
    }
    //--------------------------------------------------------------------

}
