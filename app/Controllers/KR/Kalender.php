<?php

namespace App\Controllers\KR;

use App\Models\ShiftModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Kalender extends BaseController
{
    public function __construct()
    {
        $this->kalenderModel = new ShiftModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $kalender = $this->kalenderModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Kalender',
            'title_slug' => '',
            'Kalender' => $kalender,
            'ruangan' => $ruangan['nama_ruangan'],
            'jadwal' => json_encode($this->getJadwal($kalender))

        ];
        if (is_null($this->role_check('Kepala Ruangan')) && $this->getJadwal($kalender) != null) {
            return view('KR/index', $data);
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }
	
	function check(){
		$kalender = $this->kalenderModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
		if($this->getJadwal($kalender) != null){
			return json_encode("ada");	
		}else{
			return json_encode("kosong");	
		}
	}
	
    function getJadwal($data)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Kepala Ruangan'))) {
			if($data != null){
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
			}
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }
    //--------------------------------------------------------------------
}
