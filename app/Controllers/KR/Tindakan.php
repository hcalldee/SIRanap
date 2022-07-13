<?php

namespace App\Controllers\KR;

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
use App\Models\HistoryModel;

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
        $this->historyModel = new HistoryModel();
    }

    function tindakanRuangan()
    {
        $perawat = $this->perawatModel->where('no_registrasi', session()->get('username'))->first();
        $data = $this->perawatModel->search($perawat['id']);
        $tindakan = $this->vtindakanModel->where('ruangan', $data['ruangan'])->findAll();
        return $tindakan;
    }

    public function index()
    {
        $shift = $this->shiftModel->prep();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->tindakanRuangan(),
            'perawat' => $this->perawatDay(),
            'pasien' => $this->pasienModel->byRuangan(session()->get('ruangan')),
            'ruangan' => $ruangan['nama_ruangan'],
            'dokter' => $this->dokterModel->prep(),
            'assessment' => $this->assessmentModel->prep(),
            'plan' => $this->planModel->prep(),
        ];
        if (is_null($this->role_check('Kepala Ruangan'))) {
            return view('KR/index', $data);
        } else {
            return $this->role_check('Kepala Ruangan');
        }
    }

    function tindakanDay()
    {
        $data = $this->tindakanRuangan();
        $jadwal = null;
        if ($data != null) {
            $tgl = date('d-m-Y');
            $i = 0;
            foreach ($data as $d) {
                if ($d['tanggal'] == $tgl) {
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
    }

    function perawatDay()
    {
        $data = $this->shiftModel->shiftJoin('ruangan', session()->get('ruangan'), false, true);
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

    function ReportHarian()
    {
        if ($this->request->getPost() == null) {
            return redirect()->to(base_url('/Login'));
        } else {
            $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
            $tanggal = explode('-', $this->request->getPost('tanggal'), 3);
            $tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];

            if ($this->historyModel->search('tanggal', $tanggal, false) != null) {
                return json_encode($tanggal);
            } else {
                return json_encode('kosong');
            }
        }
    }

    function ReportBulanan()
    {
        if ($this->request->getPost() == null) {
            return redirect()->to(base_url('/Login'));
        } else {
            $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
            $tanggal = explode('-', $this->request->getPost('bulan'), 2);
            $tanggal = $tanggal[1] . '-' . $tanggal[0];
            if ($this->historyModel->searchLike('tanggal', $tanggal, false) != null) {
                return json_encode($tanggal);
            } else {
                return json_encode('kosong');
            }
        }
    }

    function printharian($data = null)
    {
        if (session()->get() !== null) {
            if ($data !== null) {
                $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
                $tanggal = $data;
                if ($this->historyModel->searchLike('tanggal', $tanggal, false, 'ruangan', $ruangan['nama_ruangan']) != null) {
                    $tindakan = $this->historyModel->searchLike('tanggal', $tanggal, false, 'ruangan', $ruangan['nama_ruangan']);
                    $data = [
                        'tindakan' => $tindakan,
                        'ruangan' => $ruangan['nama_ruangan'],
                        'tanggal' => $tanggal,
                    ];
                    return view('Print/harianKR', $data);
                } else {
                    return redirect()->to(base_url('/KR'));
                }
            } else {
                return redirect()->to(base_url('/KR'));
            }
        } else {
            return redirect()->to(base_url('/KR'));
        }
    }

    function printbulanan($data = null)
    {
        if (session()->get() !== null) {
            if ($data !== null) {
                $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
                $tanggal = $data;
                if ($this->historyModel->searchLike('tanggal', $tanggal, false, 'ruangan', $ruangan['nama_ruangan']) != null) {
                    $tindakan = $this->historyModel->searchLike('tanggal', $tanggal, false, 'ruangan', $ruangan['nama_ruangan']);
                    $data = [
                        'tindakan' => $tindakan,
                        'ruangan' => $ruangan['nama_ruangan'],
                        'tanggal' => $this->bulan($tanggal),
                    ];
                    return view('Print/bulananKR', $data);
                } else {
                    return redirect()->to(base_url('/KR'));
                }
            } else {
                return redirect()->to(base_url('/KR'));
            }
        } else {
            return redirect()->to(base_url('/KR'));
        }
    }

    function bulan($data)
    {
        $data = explode('-', $data, 2);
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $text = $bulan[$data[0] - 1] . ' ' . $data[1];
        return $text;
    }

    //--------------------------------------------------------------------
}
