<?php

namespace App\Controllers\Admin;

use App\Models\PerawatModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Perawat extends BaseController
{
    protected $pasienModel;
    public function __construct()
    {
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') == null) {
            $perawat = $this->perawatModel->prep();
        } else {
            $perawat = $this->perawatModel->byRuangan(session()->get('ruangan'));
        }
        $data = [
            'title' => 'Perawat',
            'title_slug' => 'Perawat',
            'Perawat' => $perawat,
            'ruangan' => $this->ruanganModel->prep()
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->perawatModel->delete_by_id($id)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('forbidden');
        }
    }

    function getPerawat($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->request->isAJAX()) {
                $data = $this->perawatModel->search($id);
                return json_encode($data);
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
                $send = [
                    'no_registrasi' => $data['no_regis'],
                    'nama' => $data['perawat'],
                    'status' => $data['status'],
                    'no_telp' => $data['no_telp'],
                    'id_ruangan' => $data['ruangan'],
                    'alamat' => $data['alamat'],
                ];
                if ($id != null) {
                    $send['id'] = $id;
                    if ($this->perawatModel->save($send)) {
                        return json_encode('berhasil');
                    }
                } else {
                    if ($this->perawatModel->cek($data['no_regis'])->num_rows > 0) {
                        return json_encode('ada');
                    } else {
                        if ($this->perawatModel->save($send)) {
                            return json_encode('berhasil');
                        }
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
