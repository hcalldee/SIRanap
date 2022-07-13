<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\RuanganModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ruanganModel = new RuanganModel();
    }

    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            if ($this->userModel->delete_by_id($id)) {
                return json_encode(true);
            }
        } else {
            return $this->role_check('Admin');
        }
    }
    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') == null) {
            $user = $this->userModel->prep();
        } else {
            $user = $this->userModel->joinSearch('ruangan', session()->get('ruangan'));
        }
        $data = [
            'title' => 'User',
            'title_slug' => 'User',
            'user' => $user,
            'ruangan' => $this->ruanganModel->prep()
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }

    function setRuangan($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $data = session()->get();
            if ($id == null) {
                $data['ruangan'] = null;
            } else {
                $data['ruangan'] = $id;
            }
            session()->set($data);
            return json_encode('true');
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
                $data = $this->userModel->search('id', $id);
            } else {
                $data = $this->userModel->getPerawatUnactive();
            }
            return json_encode($data);
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
            if ($this->inputChecker($this->request->getPost())) {
                $data = [
                    'username' =>  $this->request->getPost('perawat'),
                    'password' => md5($this->request->getPost('perawat')),
                    'image' => 'default.jpg'
                ];
                if ($this->userModel->create($data)) {
                    return json_encode('berhasil');
                } else {
                    return json_encode('gagal');
                }
            } else {
                return json_encode('kosong');
            }
        } else {
            return $this->role_check('Admin');
        }
    }

    function reset($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $data = $this->request->getPost();
            $send = [
                'id' => $id,
                'username' =>  $data['username'],
                'password' => md5($data['username']),
                'image' => 'default.jpg'
            ];
            if ($this->userModel->save($send)) {
                return json_encode('true');
            }
        } else {
            return $this->role_check('Admin');
        }
    }

    function cekLog()
    {
        if ($this->request->getPost('username') != null && $this->request->getPost('username') != null) {
            $data = [
                'usr' => $this->request->getPost('username'),
                'pass' => md5($this->request->getPost('password'))
            ];
            if ($this->userModel->getAkunLog($data)) {
                $data = $this->userModel->getAkunLog($data);
                session()->set($data);
                return json_encode('success');
            } else {
                return json_encode('fail');
            }
        } else {
            return json_encode('kosong');
        }
    }


    public function clean()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Admin'))) {
            $this->userModel->drop();
        } else {
            return $this->role_check('Admin');
        }
    }

    function change()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $data = $this->request->getPost();
        if ($this->inputChecker($data) != null && session()->get('username') != null) {
            if (strcmp($data['password_baru'], $data['confirm_baru']) == 0) {
                $send = [
                    'usr' => session()->get('username'),
                    'pass' => md5($data['password_lama'])
                ];
                if ($this->userModel->count($send)->num_rows > 0) {
                    $send = null;
                    $send = [
                        'usr' => session()->get('username'),
                        'pass' => md5($data['password_baru'])
                    ];
                    if ($this->userModel->edit($send)->resultID > 0) {
                        return json_encode('berhasil');
                    } else {
                        return json_encode('fail');
                    }
                } else {
                    return json_encode('fail');
                }
            } else {
                return json_encode('fail');
            }
        } else {
            return json_encode('kosong');
        }
    }
    //--------------------------------------------------------------------

}
