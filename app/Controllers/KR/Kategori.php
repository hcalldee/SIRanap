<?php

namespace App\Controllers\KR;

use App\Models\KategoriModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Kategori extends BaseController
{
    protected $kategoriModel;
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
        $kategori = $this->kategoriModel->byRuangan(session()->get('ruangan'));
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Kategori',
            'title_slug' => 'kategori',
            'kategori' => $kategori,
            'ruangan' => $ruangan['nama_ruangan'],
            'id_ruangan' => session()->get('ruangan'),
            'kapasitas' => $ruangan['kapasitas'],
        ];
        if (is_null($this->role_check('Kepala Ruangan'))) {
            return view('KR/index', $data);
        } else {
            return $this->role_check('Kepala Ruangan');
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }

    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->kategoriModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }

    function getKategori($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
            if ($id != null) {
                $data = $this->kategoriModel->search('id', $id);
                return json_encode($data);
            }
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }

    function create($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
            $data = $this->request->getPost();
            if ($this->inputChecker($data)) {
                $kapasitas = $this->ruanganModel->search('id', $data['id_ruangan']);
                $kapasitas = $kapasitas['kapasitas'];
                if ($id != null) {
                    $send = [
                        'id' => $id,
                        'kategori' => $data['kategori'],
                        'jml_bed' => $data['jml_bed'],
                        'id_ruangan' => $data['id_ruangan']
                    ];
                    if ($kapasitas >= $this->max($data, $id, false)) {
                        if ($this->kategoriModel->save($send)) {
                            return json_encode('berhasil');
                        }
                    } else {
                        return json_encode('max');
                    }
                } else {
                    $send = [
                        'kategori' => $data['kategori'],
                        'jml_bed' => $data['jml_bed'],
                        'id_ruangan' => $data['id_ruangan']
                    ];
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
            return $this->role_check('Kepala Ruangan');
        }
    }

    function max($data, $id = null, $insert = true)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
            $use = $this->kategoriModel->search('id_ruangan', session()->get('ruangan'), false);
            $row = $this->kategoriModel->count($data['id_ruangan'])->num_rows;
            $uses = 0;
            if ($insert) {
                if ($row < 2) {
                    $uses = $use[0]['jml_bed'];
                } else {
                    foreach ($use as $u) {
                        $uses += $u['jml_bed'];
                    }
                }
                $uses = $uses + $data['jml_bed'];
                return $uses;
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
            return $this->role_check('Kepala Ruangan');
        }
    }
    //--------------------------------------------------------------------

}
