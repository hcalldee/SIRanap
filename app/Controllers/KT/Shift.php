<?php

namespace App\Controllers\KT;

use App\Models\ShiftModel;
use App\Models\PerawatModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Shift extends BaseController
{
    protected $shiftModel;
    protected $perawatModel;
    public function __construct()
    {
        $this->shiftModel = new ShiftModel();
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $shift = $this->myKalender();
        $perawat = $this->perawatModel->byRuangan(session()->get('ruangan'));
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Shift',
            'title_slug' => 'shift',
            'shift' => $shift,
            'perawat' => $perawat,
            'ruangan' => $ruangan['nama_ruangan']
        ];
        if (is_null($this->role_check('Ketua Tim'))) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }

    function myKalender()
    {
        $data = $this->shiftModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
        $jadwal = null;
        $now = date('Y-m-d');
        $i = 0;
        foreach ($data as $d) {
            if ($d->tanggal == $now) {
                $jadwal[$i] = $d;
                $i++;
            }
        }
        if ($jadwal == '') {
            return $data;
        } else {
            return $jadwal;
        }
    }
    function hapus($id)
    {
        if ($this->shiftModel->delete_by_id($id)) {
            return json_encode(true);
        }
    }
    function getshift($id)
    {
        if ($this->request->isAJAX()) {
            $data = $this->shiftModel->search('id', $id);
            return json_encode($data);
        }
    }
    function edit()
    {
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            if ($this->shiftModel->checker($data)) {
                return json_encode('ada');
            } else {
                $edit = [
                    'id' => $this->request->getPost('id'),
                    'tanggal' => $this->request->getPost('tgl'),
                    'keterangan' => $this->request->getPost('jaga'),
                    'id_perawat' => $this->request->getPost('perawat'),
                ];
                if ($this->shiftModel->save($edit)) {
                    return json_encode('berhasil');
                }
            }
        } else {
            return json_encode('kosong');
        }
    }

    //--------------------------------------------------------------------
}
