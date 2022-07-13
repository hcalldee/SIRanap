<?php

namespace App\Controllers\KR;

use App\Models\UserroleModel;
use App\Models\RuanganModel;
use App\Models\UserModel;
use App\Models\PerawatModel;
use App\Controllers\BaseController;

class KetuaTIm extends BaseController
{
    protected $userroleModel;
    public function __construct()
    {
        $this->userroleModel = new UserroleModel();
        $this->userModel = new UserModel();
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $userrole = $this->userroleModel->prep(true, session()->get('ruangan'));
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Ketua Tim',
            'title_slug' => 'ketuatim',
            'userrole' => $userrole,
            'ruangan' => $ruangan['nama_ruangan'],
            'perawat' => $this->perawatModel->byRuangan(session()->get('ruangan')),

        ];
        if (is_null($this->role_check('Kepala Ruangan'))) {
            return view('KR/index', $data);
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }
    function getAkun($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
            if ($id != null) {
                $data = $this->userroleModel->search('id', $id);
            } else {
                $data['perawat'] = $this->userroleModel->getPerawat();
                $data['role'] = $this->userroleModel->getRole();
            }
            return json_encode($data);
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
                $send = [
                    'id' => $id,
                    'id_user' => $data['perawat'],
                ];
                if ($this->userroleModel->save($send)) {
                    if (session()->get('username') == $data['username']) {
                        $ses = session()->get();
                        $ses['role'] = null;
                        $ses['role'][0] = 'Kepala Ruangan';
                        $ses['role'][1] = 'Perawat';
                        session()->set($ses);
                        return json_encode('berhasil');
                    } else {
                        $ses = session()->get();
                        $ses['role'][1] = 'Ketua Tim';
                        $ses['role'][2] = 'Perawat';
                        session()->set($ses);
                        return json_encode('berhasil');
                    }
                }
            } else {
                return json_encode('kosong');
            }
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }
    //--------------------------------------------------------------------

}
