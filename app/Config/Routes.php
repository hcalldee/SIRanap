<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Login', 'Auth/Login::index');
$routes->get('/Logout', function () {
	session()->destroy();
	return redirect()->to(base_url('/'));
});
$routes->get('/Login', 'Auth\Login::index');
// admin
$routes->get('/Admin', 'Admin\Dashboard::index');
$routes->get('/Admin//Dashboard', 'Admin\Dashboard::index');
$routes->get('/Admin//User', 'Admin\User::index');
$routes->get('/Admin//Perawat', 'Admin\Perawat::index');
$routes->get('/Admin//Pasien', 'Admin\Pasien::index');
$routes->get('/Admin//Ruangan', 'Admin\Ruangan::index');
$routes->get('/Admin//Assessment', 'Admin\Assessment::index');
$routes->get('/Admin//Kategori', 'Admin\Kategori::index');
$routes->get('/Admin//Dokter', 'Admin\Dokter::index');
$routes->get('/Admin//Spesialis', 'Admin\Spesialis::index');
$routes->get('/Admin//User', 'Admin\Spesialis::index');
// $routes->get('/Admin//Usermenu', 'Admin\Usermenu::index');
// $routes->get('/Admin//Useraccessmenu', 'Admin\Useraccessmenu::index');
$routes->get('/Admin//Userrole', 'Admin\Userrole::index');
$routes->get('/Admin//Role', 'Admin\Role::index');
$routes->get('/Admin//Tindakan', 'Admin\Tindakan::index');
$routes->get('/Admin//Shift', 'Admin\Shift::index');


// Kepala Ruangan
$routes->get('/KR', 'KR\Perawat::index');
$routes->get('/KR//Kalender', 'KR\Kalender::index');
$routes->get('/KR//Shift', 'KR\Shift::index');
$routes->get('/KR//Pasien', 'KR\Pasien::index');
$routes->get('/KR//Kategori', 'KR\Kategori::index');
$routes->get('/KR//Tindakan', 'KR\Tindakan::index');
$routes->get('/KR//KetuaTim', 'KR\KetuaTim::index');

//Perawat
$routes->get('/Perawat', 'Perawat\Tindakan::index');
$routes->get('/Perawat', 'Perawat\Kalender::index');
$routes->get('/Perawat', 'Perawat\Pasien::index');

//ketua Tim
$routes->get('/KT//Perawat', 'KT\Perawat::index');
$routes->get('/KT', 'KT\Tindakan::index');
$routes->get('/KT//Tindakan', 'KT\Tindakan::index');
$routes->get('/KT//Pasien', 'KT\Pasien::index');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
