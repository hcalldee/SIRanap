<?php

namespace App\Controllers\Admin;

use App\Models\PasienModel;
use App\Models\RuanganModel;
use App\Models\DokterModel;
use App\Models\KategoriModel;
use App\Controllers\BaseController;

class Pasien extends BaseController
{
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->ruanganModel = new RuanganModel();
        $this->dokterModel = new DokterModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') != null) {
            $pasien = $this->pasienModel->byRuangan(session()->get('ruangan'));
        } else {
            $pasien = $this->pasienModel->prep();
        }
        $kategori = $this->kategoriModel->prep();
        $kategori = $this->kategoriModel->ruangan($kategori);
        $data = [
            'title' => 'Pasien',
            'title_slug' => 'Pasien',
            'Pasien' => $pasien,
            'ruangan' => $this->ruanganModel->prep(),
            'dokter' => $this->dokterModel->prep(),
            'kategori' => $kategori
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }

    function getPasien($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->request->isAJAX()) {
                $data = $this->pasienModel->search($id);
                return json_encode($data);
            }
        } else {
            return json_encode('forbidden');
        }
    }
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->pasienModel->delete_by_id($id)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('forbidden');
        }
    }
    function max($data)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $kapasitas = $this->kategoriModel->search('id', $data['kategori']);
            $kapasitas = $kapasitas['jml_bed'];
            $jml_pasien = $this->pasienModel->count($data['kategori'])->num_rows + 1;
            if ($jml_pasien > $kapasitas) {
                return true;
            } else {
                return false;
            }
        } else {
            return json_encode('forbidden');
        }
    }
    function create($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $data = $this->request->getPost();
            if ($this->inputChecker($data)) {
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
						if ($this->pasienModel->sim($data['nomr'])->num_rows > 0) {
							return json_encode('ada');
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
					}
						if ($this->pasienModel->save($send)) {
							return json_encode('berhasil');
						}   
                    }
            } else {
                return json_encode('kosong');
            }
        } else {
            return json_encode('forbidden');
        }
    }

    //--------------------------------------------------------------------

}
