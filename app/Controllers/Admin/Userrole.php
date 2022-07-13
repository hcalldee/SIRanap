<?php

namespace App\Controllers\Admin;

use App\Models\UserroleModel;
use App\Models\UserModel;
use App\Models\PerawatModel;
use App\Models\RoleModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Userrole extends BaseController
{
    public function __construct()
    {
        $this->userroleModel = new UserroleModel();
        $this->userModel = new UserModel();
        $this->ruanganModel = new RuanganModel();
        $this->perawatModel = new PerawatModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $userrole = $this->userroleModel->prep();
        $data = [
            'title' => 'Userrole',
            'title_slug' => 'userrole',
            'userrole' => $userrole,
            'ruangan' => $this->ruanganModel->prep(),
            'user' => $this->userModel->prep(),
            'role' => $this->roleModel->prep(),
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getAkun($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($id != null) {
                $data = $this->userroleModel->search('id', $id);
            } else {
                $data['perawat'] = $this->userroleModel->getPerawat();
                $data['role'] = $this->userroleModel->getRole();
            }
            return json_encode($data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getRole($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            return json_encode($this->userroleModel->where('id', $id)->first());
        } else {
            return $this->role_check('Admin');
        }
    }
    function create()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
			if ($this->inputChecker($this->request->getPost())!= null) {
				$input['perawat'] = $this->request->getPost('perawat');
				$input['role'] = $this->request->getPost('role');
				$status = '';
				$data = $this->userroleModel->search2('id_user', $input['perawat']);
				foreach ($data as $dat) {
					if ($dat['role_id'] == $input['role']) {
						$status = true;
					}
				}
				if (!$status) {
					$num = sizeof($this->userroleModel->findAll());
					$data = [
						'id_user' =>  $input['perawat'],
						'role_id' => $input['role'],
					];
					if ($this->userroleModel->create($data) > 0) {
						return json_encode(true);
					}
				} else {
					return json_encode('ada');
				}	
            } else {
                return json_encode('kosong');
            }
        } else {
            return $this->role_check('Admin');
        }
    }
    function edit($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            $dat = explode('-', $id, 2);
            $send = [
                'id' => $dat[0],
                'id_user' => $dat[1],
                'role_id' => $data['role'],
            ];
            if ($this->userroleModel->save($send)) {
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
        if (is_null($this->role_check('Admin'))) {
            if ($this->userroleModel->delete($id)) {
                return json_encode(true);
            }
        } else {
            return $this->role_check('Admin');
        }
    }
    //--------------------------------------------------------------------

}
