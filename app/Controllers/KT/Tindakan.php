<?php

namespace App\Controllers\KT;

use App\Models\VTindakanModel;
use App\Models\TindakanModel;
use App\Models\AssessmentModel;
use App\Models\PlanModel;
use App\Models\UserModel;
use App\Models\DokterModel;
use App\Models\GcsModel;
use App\Models\ShiftModel;
use App\Models\JadwalModel;
use App\Models\PasienModel;
use App\Models\PerawatModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Tindakan extends BaseController
{
    public function __construct()
    {
        $this->vtindakanModel = new vTindakanModel();
        $this->tindakanModel = new TindakanModel();
        $this->assessmentModel = new AssessmentModel();
        $this->planModel = new PlanModel();
        $this->jadwalModel = new JadwalModel();
        $this->userModel = new UserModel();
        $this->dokterModel = new DokterModel();
        $this->gcsModel = new GcsModel();
        $this->pasienModel = new PasienModel();
        $this->shiftModel = new ShiftModel();
        $this->perawatModel = new PerawatModel();
        $this->ruanganModel = new RuanganModel();
    }

    function tindakanRuangan()
    {
        $perawat = $this->perawatModel->where('no_registrasi', session()->get('username'))->first();
        $data = $this->perawatModel->search($perawat['id']);
        $tindakan = $this->vtindakanModel->where('ruangan', $data['ruangan'])->findAll();
        return $tindakan;
    }

    function all()
    {
        $perawat = $this->perawatModel->where('no_registrasi', session()->get('username'))->first();
        $data = $this->perawatModel->search($perawat['id']);
        $tindakan = $this->tindakanModel->findAll();
        return $tindakan;
    }

    public function index()
    {
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->tindakanRuangan(),
            'perawat' => $this->perawatDay(),
            'pasien' => $this->pasienModel->byRuangan(session()->get('ruangan')),
            'ruangan' => $ruangan['nama_ruangan'],
            'dokter' => $this->dokterModel->prep(),
        ];
        if (is_null($this->role_check('Ketua Tim'))) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }

    public function thisDay()
    {
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->tindakanDay(),
            'perawat' => $this->perawatDay(),
            'pasien' => $this->pasienModel->byRuangan(session()->get('ruangan')),
            'ruangan' => $ruangan['nama_ruangan'],
            'dokter' => $this->dokterModel->prep(),
        ];
        if (is_null($this->role_check('Ketua Tim'))) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }

    public function thisMonth()
    {
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->tindakanMonth(),
            'perawat' => $this->perawatDay(),
            'pasien' => $this->pasienModel->byRuangan(session()->get('ruangan')),
            'ruangan' => $ruangan['nama_ruangan'],
            'dokter' => $this->dokterModel->prep(),
        ];
        if (is_null($this->role_check('Ketua Tim'))) {
            return view('KT/index', $data);
        } else {
            return $this->role_check('Ketua Tim');
        }
    }


    function tindakanDay()
    {
        $data = $this->tindakanRuangan();
        $jadwal = null;
        if ($data != null) {
            date_default_timezone_set('Asia/Makassar');
            $tgl = date('d-m-Y');
            $i = 0;
            foreach ($data as $d) {
                if ($d['tanggal'] == $tgl) {
                    $jadwal[$i] = $d;
                    $i++;
                }
            }
            return $jadwal;
        }
    }

    function tindakanMonth()
    {
        $data = $this->tindakanRuangan();
        $jadwal = null;
        if ($data != null) {
            date_default_timezone_set('Asia/Makassar');
            $tgl = date('m-Y');
            $i = 0;
            foreach ($data as $d) {
                $mnt = explode('-', $d['tanggal'], 3);
                $d['month'] = $mnt[1] . '-' . $mnt[2];
                if ($d['month'] == $tgl) {
                    $jadwal[$i] = $d;
                    $i++;
                }
            }
            return $jadwal;
        }
    }

    function perawatDay()
    {
        $data = $this->shiftModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
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
            return null;
        }
    }

    function hapus($id)
    {
        if ($this->tindakanModel->delete_by_id($id)) {
            return json_encode('berhasil');
        }
    }

    function getRole($data, $target)
    {
        if (!is_null($data)) {
            foreach ($data as $d) {
                if ($d == $target) {
                    return $target;
                }
            }
        }
    }

    function getTindakan($id)
    {
        if ($this->request->isAJAX()) {
            $data = $this->tindakanModel->search($id);
            $data = $this->tindakanModel->pre($data);
            $data = $this->tindakanModel->age($data);
            $data = $this->tindakanModel->exp($data);
            return json_encode($data);
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
                if ($this->checker($data, true)) {
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
                    return json_encode('ada');
                }
            } else {
                $send = [
                    'id_perawat' => $data['perawat'],
                    'id_pasien' => $data['pasien'],
                ];
                if ($this->checker($data)) {
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
                } else {
                    return json_encode('ada');
                }
            }
        } else {
            return json_encode('kosong');
        }
    }

    function checker($data, $edit = false)
    {
        $info = $this->tindakanRuangan();
        $state = true;
        if ($edit) {
            foreach ($info as $dat) {
                if ($dat['id_shif'] == $data['shif'] && $dat['id_perawat'] == $data['id'] && $dat['id_pasien'] == $data['pasien']) {
                    $state = false;
                }
            }
        } else {
            foreach ($info as $dat) {
                if ($dat['id_shif'] == $data['id'] && $dat['id_perawat'] == $data['perawat'] && $dat['id_pasien'] == $data['pasien']) {
                    $state = false;
                }
            }
        }
        return $state;
    }
    //--------------------------------------------------------------------
}
