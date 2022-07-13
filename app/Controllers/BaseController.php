<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	public function cek_log()
	{
		$now = time();
		if ($now > session()->get('log_expire')) {
			return redirect()->to(base_url('/Logout'));
		} else {
			return false;
		}
	}
	function inputChecker($data, $status = true)
	{
		$data = array_values($data);
		foreach ($data as $d) {
			if ($d == null) {
				$status = false;
				break;
			}
		}
		return $status;
	}
	function cekSesion($data = null)
	{
		$role = session()->get($data);
		return $role;
	}
	function role_check($role)
	{
		$data = session()->get('role');
		if ($role == "Admin") {

			if (!is_null($data)) {
				foreach ($data as $dat) {
					if ($dat == 'Admin') {
						return null;
						break;
					} else {
						return redirect()->to(base_url('/Login'));
					}
				}
			} else {
				return redirect()->to(base_url('/Login'));
			}
			//admin
		} else if ($role == "Perawat") {

			if (!is_null($data)) {
				foreach ($data as $dat) {
					if ($dat == "Perawat") {
						return null;
						break;
					}
				}
				return redirect()->to(base_url('/Login'));
			} else {
				return redirect()->to(base_url('/Login'));
			}
			//perawat
		} else if ($role == "Kepala Ruangan") {
			if (!is_null($data)) {
				foreach ($data as $dat) {
					if ($dat == 'Kepala Ruangan') {
						return null;
						break;
					}
				}
				return redirect()->to(base_url('/Login'));
			} else {
				return redirect()->to(base_url('/Login'));
			}
			//kepala ruangan
		} else if ($role == "Ketua Tim") {
			if (!is_null($data)) {
				foreach ($data as $dat) {
					if ($dat == 'Ketua Tim') {
						return null;
						break;
					}
				}
				return redirect()->to(base_url('/Login'));
			} else {
				return redirect()->to(base_url('/Login'));
			}
			//ketua tim
		}
	}
}
