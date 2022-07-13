<?php

namespace App\Controllers\Admin;

use App\Models\VTindakanModel;
use App\Models\TindakanModel;
use App\Models\RuanganModel;
use App\Models\DokterModel;
use App\Models\ShiftModel;
use App\Models\PasienModel;
use App\Models\GcsModel;
use App\Models\JadwalModel;
use App\Controllers\BaseController;

class Tindakan extends BaseController
{
    protected $tindakanModel;
    public function __construct()
    {
        $this->vtindakanModel = new VTindakanModel();
        $this->tindakanModel = new TindakanModel();
        $this->ruanganModel = new RuanganModel();
        $this->dokterModel = new DokterModel();
        $this->shiftModel = new ShiftModel();
        $this->pasienModel = new PasienModel();
		$this->gcsModel = new GcsModel();
		$this->jadwalModel = new JadwalModel();
    }


    function perawatDay()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') != null) {
            $data = $this->shiftModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
        } else {
            $data = $this->shiftModel->shiftJoin();
        }
        date_default_timezone_set('Asia/Makassar');
        $tgl = date('Y-m-d');
        $i = 0;
        $jadwal = null;
        foreach ($data as $d) {
            if ($d->tanggal == $tgl) {
                $jadwal[$i] = $d;
                $i++;
            }
        }
        if ($jadwal != null) {
            return $jadwal;
        } else {
            return $data;
        }
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (session()->get('ruangan') != null) {
            $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
            $tindakan = $this->vtindakanModel->search2('ruangan', $ruangan['nama_ruangan'], false);
        } else {
            $tindakan = $this->vtindakanModel->prep();
        }
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $tindakan,
            'ruangan' => $this->ruanganModel->prep(),
            'dokter' => $this->dokterModel->prep(),
            'perawat' => $this->perawatDay(),
            'pasien' => $this->pasienModel->prep()
        ];
        if (is_null($this->role_check('Admin'))) {
            return view('Admin/index', $data);
        } else {
            return $this->role_check('Admin');
        }
    }
    function getTindakan($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if ($this->request->isAJAX()) {
            $data = $this->tindakanModel->search($id);
            $data = $this->tindakanModel->pre($data);
            $data = $this->tindakanModel->age($data);
            $data = $this->tindakanModel->exp($data);
            return json_encode($data);
        }
    }
	
	function hapus($id)
    {
        if ($this->tindakanModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }
	
	function create($id = null)
    {
        $data = $this->request->getPost();
        if ($this->inputChecker($data)) {
            if ($id != null) {
                $send = [
                    'id' => $id,
                    'id_perawat' => $data['id'],
                    'id_pasien' => $data['pasien'],
                ];
                if ($this->tindakanModel->save($send)) {
                    $send_gcs = [
                        'id' => $data['id_gcs'],
                        'id_tindakan' => $id,
                    ];
                    $send_jadwal = [
                        'id' => $data['id_jadwal'],
                        'id_tindakan' => $id,
                        'id_shif' => $data['shif'],
                    ];
                    if ($this->gcsModel->save($send_gcs) && $this->jadwalModel->save($send_jadwal)) {
                        return json_encode('berhasil');
                    }
                } else {
                    return json_encode('kosong');
                }
            } else {
                $send = [
                    'id_perawat' => $data['perawat'],
                    'id_pasien' => $data['pasien'],
                ];
                if ($this->tindakanModel->save($send)) {
                    $id_tindakan = sizeof($this->tindakanModel->findAll());
                    $send_gcs = [
                        'id_tindakan' => $id_tindakan,
                    ];
                    $send_jadwal = [
                        'id_tindakan' => $id_tindakan,
                        'id_shif' => $data['id'],
                    ];
                    if ($this->gcsModel->save($send_gcs) && $this->jadwalModel->save($send_jadwal)) {
                        return json_encode('berhasil');
                    }
                } else {
                    return json_encode('kosong');
                }
            }
        } else {
            return json_encode('kosong');
        }
    }
    //--------------------------------------------------------------------

}
