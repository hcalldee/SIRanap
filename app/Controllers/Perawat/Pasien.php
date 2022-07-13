<?php

namespace App\Controllers\Perawat;

use App\Models\PasienModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Pasien extends BaseController
{
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $ruangan = session()->get('ruangan');
        $pasien = $this->pasienModel->byRuangan($ruangan);
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Pasien',
            'title_slug' => 'pasien',
            'Pasien' => $pasien,
            'ruangan' => $ruangan['nama_ruangan'],
        ];
        if (is_null($this->role_check('Perawat'))) {
            return view('Perawat/index', $data);
        } else {
            return $this->role_check('Perawat');
        }
    }

    function getPasien($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->request->isAJAX()) {
            $data = $this->pasienModel->search($id);
            return json_encode($data);
        }
    }
    //--------------------------------------------------------------------

}
