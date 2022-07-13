<?php

namespace App\Controllers\Admin;

use App\Models\SpesialisModel;
use App\Controllers\BaseController;

class Spesialis extends BaseController
{
    protected $spesialisModel;
    public function __construct()
    {
        $this->spesialisModel = new SpesialisModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $spesialis = $this->spesialisModel->prep();
        $data = [
            'title' => 'Spesialis',
            'title_slug' => 'spesialis',
            'spesialis' => $spesialis
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getSpesialis($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        return json_encode($this->spesialisModel->search('id', $id));
    }
    function create($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            $send = [
                'nama' => $data['spesialis'],
            ];
            if ($id != null) {
                $send['id'] = $id;
            }
            if ($this->spesialisModel->save($send)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('kosong');
        }
    }
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->spesialisModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }
    //--------------------------------------------------------------------

}
