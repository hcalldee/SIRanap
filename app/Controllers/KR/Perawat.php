<?php

namespace App\Controllers\KR;

use App\Models\PerawatModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Perawat extends BaseController
{
    public function __construct()
    {
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $ruangan = session()->get('ruangan');
        $perawat = $this->perawatModel->byRuangan($ruangan);
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Perawat',
            'title_slug' => 'Perawat',
            'Perawat' => $perawat,
            'ruangan' => $ruangan['nama_ruangan']
        ];
        if (is_null($this->role_check('Kepala Ruangan'))) {
            return view('KR/index', $data);
        } else {
            return $this->role_check('Kepala Ruangan');
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
