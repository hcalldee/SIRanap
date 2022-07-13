<?php

namespace App\Controllers\Admin;

use App\Models\DokterModel;
use App\Models\SpesialisModel;
use App\Controllers\BaseController;

class Dokter extends BaseController
{
    protected $dokterModel;
    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->spesialisModel = new SpesialisModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $dokter = $this->dokterModel->prep();
        $data = [
            'title' => 'Dokter',
            'title_slug' => 'Dokter',
            'Dokter' => $dokter,
            'spesialis' => $this->spesialisModel->prep()

        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getDokter($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        return json_encode($this->dokterModel->search('id', $id));
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
                    'nama' => $data['nama'],
                    'no_telp' => $data['no_telp'],
                    'alamat' => $data['alamat'],
                    'id_spesialis' => $data['spesialis'],
                ];
                if ($id != null) {
                    $send['id'] = $id;
                }
                if ($this->dokterModel->save($send)) {
                    return json_encode('berhasil');
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
            if ($this->dokterModel->delete_by_id($id)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('forbidden');
        }
    }
    //--------------------------------------------------------------------

}
