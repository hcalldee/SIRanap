<?php

namespace App\Controllers\Perawat;

use App\Models\VTindakanModel;
use App\Models\TindakanModel;
use App\Models\AssessmentModel;
use App\Models\PlanModel;
use App\Models\UserModel;
use App\Models\DokterModel;
use App\Models\GcsModel;
use App\Models\HistoryModel;
use App\Models\RuanganModel;
use App\Controllers\BaseController;

class Tindakan extends BaseController
{
    protected $pasienModel;
    public function __construct()
    {
        $this->vtindakanModel = new vTindakanModel();
        $this->tindakanModel = new TindakanModel();
        $this->assessmentModel = new AssessmentModel();
        $this->planModel = new PlanModel();
        $this->userModel = new UserModel();
        $this->dokterModel = new DokterModel();
        $this->ruanganModel = new RuanganModel();
        $this->historyModel = new HistoryModel();
        $this->gcsModel = new GCSModel();
    }

    function myTindakanToday()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            $data = $this->vtindakanModel->prep();
            $perawat = session()->get('nama');
            $now = date('d-m-Y');
            $i = 0;
            $tindakan = null;
            foreach ($data as $d) {
                if ($d['perawat'] == $perawat && $d['tanggal'] == $now) {
                    $tindakan[$i] = $d;
                    $i++;
                }
            }
            if ($tindakan != null) {
                return $tindakan;
            } else {
                return null;
            }
        } else {
            return $this->role_check('Perawat');
        }
    }

    function myTindakan()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            $data = $this->vtindakanModel->search2('perawat', session()->get('nama'), false);
            return $data;
        } else {
            return $this->role_check('Perawat');
        }
    }

    function TindakanRuangan()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
            $data = $this->vtindakanModel->search2('ruangan', $ruangan['nama_ruangan'], false);
            return $data;
        } else {
            return $this->role_check('Perawat');
        }
    }

    public function index()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $assessment = $this->assessmentModel->prep();
        $dokter = $this->dokterModel->prep();
        $plan = $this->planModel->prep();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->myTindakanToday(),
            'assessment' => $assessment,
            'plan' => $plan,
            'dokter' => $dokter,
            'ruangan' => $ruangan['nama_ruangan'],
            'edit' => true
        ];
        if (is_null($this->role_check('Perawat'))) {
            return view('Perawat/index', $data);
        } else {
            return $this->role_check('Perawat');
        }
    }

    public function All()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $assessment = $this->assessmentModel->prep();
        $dokter = $this->dokterModel->prep();
        $plan = $this->planModel->prep();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->myTindakan(),
            'assessment' => $assessment,
            'plan' => $plan,
            'dokter' => $dokter,
            'ruangan' => $ruangan['nama_ruangan'],
            'edit' => false
        ];
        if (is_null($this->role_check('Perawat'))) {
            return view('Perawat/index', $data);
        } else {
            return $this->role_check('Perawat');
        }
    }

    public function Ruangan()
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        $assessment = $this->assessmentModel->prep();
        $dokter = $this->dokterModel->prep();
        $plan = $this->planModel->prep();
        $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
        $data = [
            'title' => 'Tindakan',
            'title_slug' => 'tindakan',
            'tindakan' => $this->TindakanRuangan(),
            'assessment' => $assessment,
            'plan' => $plan,
            'dokter' => $dokter,
            'ruangan' => $ruangan['nama_ruangan'],
            'edit' => false
        ];
        if (is_null($this->role_check('Perawat'))) {
            return view('Perawat/index', $data);
        } else {
            return $this->role_check('Perawat');
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

            if ($this->historyModel->search('tanggal', $tanggal, false, 'no_registrasi', session()->get('username')) != null) {
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

            if ($this->historyModel->searchLike('tanggal', $tanggal, false, 'no_registrasi', session()->get('username')) != null) {
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
                if ($this->historyModel->searchLike('tanggal', $tanggal, false, 'no_registrasi', session()->get('username')) != null) {
                    $tindakan = $this->historyModel->searchLike('tanggal', $tanggal, false, 'no_registrasi', session()->get('username'));
                    $data = [
                        'tindakan' => $tindakan,
                        'ruangan' => $ruangan['nama_ruangan'],
                        'tanggal' => $tanggal,
                    ];
                    return view('Print/harian', $data);
                } else {
                    return redirect()->to(base_url('/Perawat'));
                }
            } else {
                return redirect()->to(base_url('/Perawat'));
            }
        } else {
            return redirect()->to(base_url('/Perawat'));
        }
    }

    function printbulanan($data = null)
    {
        if (session()->get() !== null) {
            if ($data !== null) {
                $ruangan = $this->ruanganModel->search('id', session()->get('ruangan'));
                $tanggal = $data;
                if ($this->historyModel->searchLike('tanggal', $tanggal, false, 'no_registrasi', session()->get('username')) != null) {
                    $tindakan = $this->historyModel->searchLike('tanggal', $tanggal, false, 'no_registrasi', session()->get('username'));
                    $data = [
                        'tindakan' => $tindakan,
                        'ruangan' => $ruangan['nama_ruangan'],
                        'tanggal' => $this->bulan($tanggal),
                    ];
                    return view('Print/bulanan', $data);
                } else {
                    return redirect()->to(base_url('/Perawat'));
                }
            } else {
                return redirect()->to(base_url('/Perawat'));
            }
        } else {
            return redirect()->to(base_url('/Perawat'));
        }
    }
    function getRole($data, $target)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            if (!is_null($data)) {
                foreach ($data as $d) {
                    if ($d == $target) {
                        return $target;
                    }
                }
            }
        } else {
            return $this->role_check('Perawat');
        }
    }

    function getTindakan($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            if ($this->request->isAJAX()) {
                $data = $this->tindakanModel->search($id);
                $data = $this->tindakanModel->pre($data);
                $data = $this->tindakanModel->age($data);
                $data = $this->tindakanModel->exp($data);
                return json_encode($data);
            }
        } else {
            return $this->role_check('Perawat');
        }
    }


    function bulan($data)
    {
        $data = explode('-', $data, 2);
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $text = $bulan[$data[0] - 1] . ' ' . $data[1];
        return $text;
    }

    function isiTindakan($id)
    {
        if ($this->cek_log() != false) {
            return $this->cek_log();
        }
        if (is_null($this->role_check('Perawat'))) {
            $data = $this->request->getPost();
            if ($this->inputChecker($data)) {
                $edit = [
                    'id' => $id,
                    'keadaan_umum' => $this->request->getPost('keadaan_umum'),
                    'temp' => $this->request->getPost('temp') . '-' . $this->request->getPost('deskriptemp'),
                    'jml_nafas' => $this->request->getPost('jml_nafas') . '-' . $this->request->getPost('deskripjml_nafas'),
                    'tekanan_darah' => $this->request->getPost('sistolik') . '/' . $this->request->getPost('diastolik'),
                    'denyut_jantung' => $this->request->getPost('pulse') . '-' . $this->request->getPost('deskrippulse'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'subjektif' => $this->request->getPost('subjektif'),
                    'objektif' => $this->request->getPost('objektif'),
                    'id_assessment' => $this->request->getPost('assessment'),
                    'id_plan' => $this->request->getPost('planning'),
                    'id_dokter' => $this->request->getPost('dokter'),
                ];
                if ($this->tindakanModel->save($edit)) {
                    $gcs = [
                        'id' => $id,
                        'eye' => $this->request->getPost('eye'),
                        'verba' => $this->request->getPost('verba'),
                        'motorik' => $this->request->getPost('motorik'),
                        'id_tindakan' => $id
                    ];
                    if ($this->gcsModel->save($gcs)) {
                        $send = $this->vtindakanModel->search2('id', $id, true);
                        if ($this->inputChecker($send)) {
                            $tanggal = explode('-', $send['tanggal'], 3);
                            $send['id'] = $send['id'] . $tanggal[0] . $tanggal[1] . $tanggal[2] . $send['no_registrasi'];
                            if (!empty($this->historyModel->search('id', $send['id']))) {
                                if ($this->historyModel->save($send)) {
                                    return json_encode('berhasil');
                                }
                            } else {
                                $this->historyModel->insert($send);
                                if ($this->historyModel->db->mysqli->affected_rows) {
                                    return json_encode('berhasil');
                                }
                            }
                        } else {
                            return json_encode('kosong');
                        }
                    } else {
                        return json_encode('kosong');
                    }
                }
            } else {
                return json_encode('kosong');
            }
        } else {
            return $this->role_check('Perawat');
        }
    }

    //--------------------------------------------------------------------

}
