<?php

namespace App\Controllers\KT;

use App\Models\PerawatModel;
use App\Controllers\BaseController;

class Perawat extends BaseController
{
    public function __construct()
    {
        $this->perawatModel = new PerawatModel();
    }

    public function index()
    {
        $ruangan = session()->get('ruangan');
        $perawat = $this->perawatModel->prep();
        $data = [
            'title' => 'Perawat',
            'title_slug' => 'Perawat',
            'Perawat' => $perawat,
            'ruangan' => $this->perawatModel->ruangan($ruangan)
        ];
        return view('KT/index', $data);
        if (is_null($this->role_check('Ketua Tim'))) {
        } else {
            return $this->role_check('Ketua Tim');
        }
    }

    function getPerawat($id)
    {
        if ($this->request->isAJAX()) {
            $data = $this->perawatModel->search($id);
            return json_encode($data);
        }
    }
    //--------------------------------------------------------------------

}
