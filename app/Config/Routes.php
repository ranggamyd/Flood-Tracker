<?php

namespace Config;

use App\Controllers\Auth;
use App\Controllers\Cuaca;
use App\Controllers\Pelaporan;
use App\Controllers\LokasiBanjir;
use App\Controllers\AsetTerdampak;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('cuaca', 'Cuaca::index');
$routes->get('lokasi_banjir', 'LokasiBanjir::index');
$routes->get('lokasi_banjir/(:num)', 'LokasiBanjir::view/$1');
$routes->get('aset_terdampak', 'AsetTerdampak::index');

$routes->match(['get', 'post'], 'login', 'Auth::index');
$routes->match(['get', 'post'], 'register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

$routes->group('', ['filter' => 'userAuth'], function ($routes) {
    $routes->get('laporan_saya', 'Pelaporan::index');
    $routes->match(['get', 'post'], 'pelaporan', 'Pelaporan::laporkan_banjir');
    $routes->delete('pelaporan/(:num)', 'Pelaporan::delete/$1');
});

$routes->get('dashboard', '\App\Controllers\Admin\Dashboard::index', ['filter' => 'adminAuth']);

$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', '\App\Controllers\Admin\Dashboard::index');

    $routes->get('pelaporan', '\App\Controllers\Admin\Pelaporan::index');
    $routes->delete('pelaporan/(:num)', '\App\Controllers\Admin\Pelaporan::delete/$1');
    $routes->get('pelaporan/konfirmasi/(:num)', '\App\Controllers\Admin\Pelaporan::konfirmasi/$1');
    $routes->get('pelaporan/tolak/(:num)', '\App\Controllers\Admin\Pelaporan::tolak/$1');
    $routes->match(['get', 'put'], 'pelaporan/update/(:num)', '\App\Controllers\Admin\Pelaporan::update/$1');
    
    $routes->get('lokasi_banjir', '\App\Controllers\Admin\LokasiBanjir::index');
    $routes->delete('lokasi_banjir/(:num)', '\App\Controllers\Admin\LokasiBanjir::delete/$1');
    $routes->get('lokasi_banjir/(:num)', '\App\Controllers\Admin\LokasiBanjir::view/$1');
    $routes->match(['get', 'post'], 'lokasi_banjir/create', '\App\Controllers\Admin\LokasiBanjir::create');
    $routes->match(['get', 'put'], 'lokasi_banjir/update/(:num)', '\App\Controllers\Admin\LokasiBanjir::update/$1');

    $routes->get('aset_terdampak', '\App\Controllers\Admin\AsetTerdampak::index');
    $routes->delete('aset_terdampak/(:num)', '\App\Controllers\Admin\AsetTerdampak::delete/$1');
    $routes->match(['get', 'post'], 'aset_terdampak/kelola_aset/(:num)', '\App\Controllers\Admin\AsetTerdampak::kelola_aset/$1');
    
    $routes->get('users', '\App\Controllers\Admin\User::index');
    $routes->delete('users/(:num)', '\App\Controllers\Admin\User::delete/$1');
    $routes->get('users/(:num)', '\App\Controllers\Admin\User::view/$1');
    $routes->match(['get', 'post'], 'users/create', '\App\Controllers\Admin\User::create');
    $routes->match(['get', 'put'], 'users/update/(:num)', '\App\Controllers\Admin\User::update/$1');
});

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
