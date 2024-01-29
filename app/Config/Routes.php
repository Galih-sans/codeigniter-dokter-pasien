<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Dokter::index');
// $routes->get('/pages', 'Pages::index');
// $routes->get('/pages/about', 'Pages::about');
// $routes->get('/pages/contact', 'Pages::contact');

$routes->get('/dokter', 'Dokter::index');
$routes->get('/dokter/ambildata', 'Dokter::ambildata');
$routes->get('/dokter/formTambah', 'Dokter::formTambah');
$routes->post('/dokter/simpanData', 'Dokter::simpanData');
$routes->post('/dokter/updateData', 'Dokter::updateData');
$routes->post('/dokter/editDokter', 'Dokter::editDokter');
$routes->post('/dokter/hapusDokter', 'Dokter::hapusDokter');

$routes->get('/pasien', 'Pasien::index');
$routes->get('/pasien/ambildata', 'Pasien::ambildata');
$routes->get('/pasien/formTambah', 'Pasien::formTambah');
$routes->post('/pasien/simpanData', 'Pasien::simpanData');
$routes->post('/pasien/updateData', 'Pasien::updateData');
$routes->post('/pasien/editPasien', 'Pasien::editPasien');
$routes->post('/pasien/hapusPasien', 'Pasien::hapusPasien');

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
