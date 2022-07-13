<?php

namespace App\Controllers;

use App\Models\RuanganModel;
use App\Models\KategoriModel;
use App\Models\PasienModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ruanganModel = new RuanganModel();
		$this->kategoriModel = new KategoriModel();
		$this->pasienModel = new PasienModel();
	}

	function count()
	{
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
			'title' => 'Beranda',
			'ruangan' => $this->count(),
			'nama_ruangan' => $this->ruanganModel->prep(),
			'total_pasien' => sizeof($this->pasienModel->prep()),
			'jml_positif' => sizeof($this->pasienModel->search2('status', 'Positif', false)),
			'jml_negatif' => sizeof($this->pasienModel->search2('status', 'Negatif', false)),
			'jml_laki' => sizeof($this->pasienModel->search2('jenis_kelamin', 'Laki Laki', false)),
			'jml_perempuan' => sizeof($this->pasienModel->search2('jenis_kelamin', 'Perempuan', false)),
		];
		return view('landingpage/index', $data);
	}

	function getRuanganKategori($id)
	{
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

	public function about()
	{
		$data = [
			'title' => 'About'
		];
		return view('landingpage/index', $data);
	}

	//--------------------------------------------------------------------

}
