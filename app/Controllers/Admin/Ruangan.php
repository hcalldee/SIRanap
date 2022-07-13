<?php

namespace App\Controllers\Admin;

use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Ruangan extends BaseController
{
    protected $ruanganModel;
    public function __construct()
    {
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $ruangan = $this->ruanganModel->prep();
        $data = [
            'title' => 'Ruangan',
            'title_slug' => 'Ruangan',
            'ruangan' => $ruangan
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getRuanganKategori($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $res = $this->ruanganModel->getKategori($id);
            return json_encode($res);
        } else {
            return json_encode('forbidden');
        }
    }
    function getRuangan($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $res = $this->ruanganModel->search('id', $id);
            return json_encode($res);
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
                if ($this->ruanganModel->count($data)->num_rows > 0) {
                    return json_encode('ada');
                } else {
                    $send = [
                        'nama_ruangan' => $data['ruangan'],
                        'kapasitas' => $data['kapasitas'],
                    ];
                    if ($id != null) {
                        $send['id'] = $id;
                    }
                    if ($this->ruanganModel->save($send)) {
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
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->ruanganModel->delete_by_id($id)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('forbidden');
        }
    }
    //--------------------------------------------------------------------

}
