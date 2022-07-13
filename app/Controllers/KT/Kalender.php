<?php

namespace App\Controllers\KT;

use App\Models\ShiftModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Kalender extends BaseController
{
    public function __construct()
    {
        $this->ruanganModel = new RuanganModel();
        $this->kalenderModel = new ShiftModel();
    }

    public function index()
    {
        $kalender = $this->myKalender();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Kalender',
            'title_slug' => '',
            'Kalender' => $kalender,
            'jadwal' => json_encode($this->getJadwal($kalender)),
            'ruangan' => $ruangan['nama_ruangan']
        ];
        if (is_null($this->role_check('Ketua Tim')) && $this->getJadwal($kalender) != null) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }
    function check()
    {
        $kalender = $this->myKalender();
        if ($this->getJadwal($kalender) != null) {
            return json_encode("ada");
        } else {
            return json_encode("kosong");
        }
    }
    function getDateTime()
    {
        $date = date_create('now')->format('d-m-Y');
        $date = explode('-', $date, 3);
        $date[0] = $date[0] + 1;
        $date = $date[2] . '-' . $date[1] . '-' . $date[0];
        return $date;
    }
    function myKalender()
    {
        $data = $this->kalenderModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
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
    function getJadwal($data)
    {
        if ($data != null) {
            foreach ($data as $s) {
                if ($s->keterangan == "Pagi") {
                    $s->keterangan = [
                        'datang' => "08:00:00",
                        'pulang' => "14:00:00",
                        'jaga' => "Jaga Pagi"
                    ];
                } else if ($s->keterangan == "Sore") {
                    $s->keterangan = [
                        'datang' => "14:00:00",
                        'pulang' => "21:00:00",
                        'jaga' => "Jaga Sore"
                    ];
                } else if ($s->keterangan == "Malam") {
                    $s->keterangan = [
                        'datang' => "21:00:00",
                        'pulang' => "08:00:00",
                        'jaga' => "Jaga Malam"
                    ];
                }
            }
            $i = 0;
            foreach ($data as $data) {
                $jadwal[$i] = array(
                    'startDate' => $data->tanggal . ' ' . $data->keterangan['datang'],
                    'endDate' => $data->tanggal . ' ' . $data->keterangan['pulang'],
                    'summary' => $data->keterangan['jaga'] . '<br>' . $data->perawat . '<br>'
                );
                $i++;
            }
            return $jadwal;
        } else {
            return null;
        }
    }
    //--------------------------------------------------------------------
}
