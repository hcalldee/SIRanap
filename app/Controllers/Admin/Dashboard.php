<?php

namespace App\Controllers\Admin;

use App\Models\RuanganModel;
use App\Models\KategoriModel;
use App\Models\PasienModel;
use App\Models\ShiftModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->ruanganModel = new RuanganModel();
		$this->kategoriModel = new KategoriModel();
		$this->pasienModel = new PasienModel();
		$this->shiftModel = new ShiftModel();
	}

	function count()
	{
		if ($this->cek_log() != false) {
			return $this->cek_log();
		}
		$ruangan = $this->ruanganModel->prep();
		$i = 0;
		foreach ($ruangan as $r) {
			$ruangan[$i]['count'] = sizeof($this->pasienModel->pasienByruangan($r['id']));
			$i++;
		}
		return $ruangan;
	}

	function namaRuangan()
	{
		if ($this->cek_log() != false) {
			return $this->cek_log();
		}
		$ruangan = $this->ruanganModel->prep();
		$i = 0;
		foreach ($ruangan as $r) {
			$data[$i] = $r['nama_ruangan'];
			$i++;
		}
		return $data;
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'title_slug' => 'dashboard',
			'ruangan' => $this->count(),
			'shift' => $this->shiftModel->shiftJoin()
		];
		if ($this->cek_log() != false) {
			return $this->cek_log();
		}
		if (is_null($this->role_check('Admin'))) {
			return view('Admin/index', $data);
		} else {
			return $this->role_check('Admin');
		}
	}

	function getRuanganKategori($id)
	{
		if ($this->cek_log() != false) {
			return $this->cek_log();
		}
		$res = $this->ruanganModel->getKategori($id);
		$i = 0;
		foreach ($res as $r) {
			$res[$i]['count'] = sizeof($this->pasienModel->pasienBykategori($r['id']));
			$res[$i]['count_l'] = sizeof($this->pasienModel->pasienBykategorilaki($r['id']));
			$res[$i]['count_p'] = sizeof($this->pasienModel->pasienBykategoriperempuan($r['id']));
			$i++;
		}
		return json_encode($res);
	}

	//--------------------------------------------------------------------

}
