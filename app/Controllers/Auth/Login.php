<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sisranap - Login',
            'title_slug' => 'Login'
        ];
        $role = session()->get('role');
        if (is_null($role)) {
            return view('Auth/index', $data);
        } else {
            foreach ($role as $r) {
                if ($r == "Admin") {
                    return redirect()->to(base_url('/Admin'));
                } else if ($r == "Perawat") {
                    return redirect()->to(base_url('/Perawat'));
                } else {
                    if ($r == "Ketua Tim") {
                        return redirect()->to(base_url('/KT'));
                    } else {
                        if ($r == "Kepala Ruangan") {
                            return redirect()->to(base_url('/KR'));
                        }
                    }
                }
            }
            return view('Auth/index', $data);
        }
    }
    //--------------------------------------------------------------------

}
