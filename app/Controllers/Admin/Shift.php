<?php

namespace App\Controllers\Admin;

use App\Models\ShiftModel;
use App\Models\PerawatModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Shift extends BaseController
{
    public function __construct()
    {
        $this->shiftModel = new ShiftModel();
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') != null) {
            $shift = $this->shiftModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
            $perawat = $this->perawatModel->byRuangan(session()->get('ruangan'));
        } else {
            $perawat = $this->perawatModel->findAll();
            $shift = $this->shiftModel->shiftJoin();
        }
        $data = [
            'title' => 'Shift',
            'title_slug' => 'shift',
            'shift' => $shift,
            'perawat' => $perawat,
            'ruangan' => $this->ruanganModel->prep()
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function hapus($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->shiftModel->delete_by_id($id)) {
            return json_encode(true);
        }
    }
    function getshift($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->request->isAJAX()) {
            $data = $this->shiftModel->search('id', $id);
            return json_encode($data);
        }
    }
    function create($id = null)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            if ($this->shiftModel->checker($data)) {
                return json_encode('ada');
            } else {
                $create = [
                    'tanggal' => $this->request->getPost('tgl'),
                    'keterangan' => $this->request->getPost('jaga'),
                    'id_perawat' => $this->request->getPost('perawat'),
                ];
                if ($id != null) {
                    $create['id'] = $id;
                }
                if ($this->shiftModel->save($create)) {
                    return json_encode('berhasil');
                }
            }
        } else {
            return json_encode('kosong');
        }
    }

    //--------------------------------------------------------------------
}
