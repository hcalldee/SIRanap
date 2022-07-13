<?php

namespace App\Controllers\Admin;

use App\Models\KategoriModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan')) {
            $kategori = $this->kategoriModel->byRuangan(session()->get('ruangan'));
        } else {
            $kategori = $this->kategoriModel->prep();
        }
        $data = [
            'title' => 'Kategori',
            'title_slug' => 'kategori',
            'kategori' => $kategori,
            'ruangan' => $this->ruanganModel->prep()
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getKategori($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($id != null) {
                $data = $this->kategoriModel->search('id', $id);
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
            if ($this->kategoriModel->delete_by_id($id)) {
                return json_encode('berhasil');
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
                $kapasitas = $this->ruanganModel->search('id', $data['ruangan']);
                $kapasitas = $kapasitas['kapasitas'];
                $send = [
                    'id_ruangan' => $data['ruangan'],
                    'kategori' => $data['kategori'],
                    'jml_bed' => $data['jml_bed']
                ];
                if ($id != null) {
                    $send['id'] = $id;
                    if ($kapasitas >= $this->max($data, $id, false)) {
                        if ($this->kategoriModel->save($send)) {
                            return json_encode('berhasil');
                        }
                    } else {
                        return json_encode('max');
                    }
                } else {
                    if ($kapasitas >= $this->max($data)) {
                        if ($this->kategoriModel->save($send)) {
                            return json_encode('berhasil');
                        }
                    } else {
                        return json_encode('max');
                    }
                }
            } else {
                return json_encode('kosong');
            }
        } else {
            return json_encode('forbidden');
        }
    }
    function max($data, $id = null, $insert = true)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $use = $this->kategoriModel->search('id_ruangan', $data['ruangan'], false);
            $row = $this->kategoriModel->count($data['ruangan'])->num_rows;
            $uses = 0;
            if ($insert) {
				if($row!=0){
					if ($row < 2) {
						$uses = $use[0]['jml_bed'];
					} else {
						foreach ($use as $u) {
							$uses += $u['jml_bed'];
						}
					}
					$uses = $uses + $data['jml_bed'];	
					return $uses;
				}else{
					return $data['jml_bed'];
				}                
            } else {
                if ($row > 1) {
                    foreach ($use as $u) {
                        if ($u['id'] != $id) {
                            $uses += $u['jml_bed'];
                        }
                    }
                    $uses = $uses + $data['jml_bed'];
                    return $uses;
                } else {
                    return $data['jml_bed'];
                }
            }
        } else {
            return json_encode('forbidden');
        }
    }
    //--------------------------------------------------------------------

}
