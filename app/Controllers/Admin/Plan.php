<?php

namespace App\Controllers\Admin;

use App\Models\planModel;
use App\Controllers\BaseController;

class Plan extends BaseController
{
    public function __construct()
    {
        $this->planModel = new planModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $plan = $this->planModel->prep();
        $data = [
            'title' => 'Planning',
            'title_slug' => 'Planning',
            'plan' => $plan,
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getPlan($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            return json_encode($this->planModel->search('id', $id));
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
                    'planning' => $data['planning'],
                ];
                if ($id != null) {
                    $send['id'] = $id;
                }
                if ($this->planModel->save($send)) {
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
            if ($this->planModel->delete_by_id($id)) {
                return json_encode('berhasil');
            }
        } else {
            return json_encode('forbidden');
        }
    }
    //--------------------------------------------------------------------

}
