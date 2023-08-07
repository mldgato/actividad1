<?php

namespace Config;

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


$routes->get('regiones/index','RegionController::index');
$routes->get('regiones/create','RegionController::create');
$routes->post('regiones/store','RegionController::store');
$routes->get('regiones/edit/(:num)', 'RegionController::edit/$1');
$routes->post('regiones/update/(:num)', 'RegionController::update/$1');
$routes->get('regiones/delete/(:num)', 'RegionController::delete/$1');

$routes->get('departamentos/index','DepartamentoController::index');
$routes->get('departamentos/create','DepartamentoController::create');
$routes->post('departamentos/store','DepartamentoController::store');
$routes->get('departamentos/edit/(:num)', 'DepartamentoController::edit/$1');
$routes->post('departamentos/update/(:num)', 'DepartamentoController::update/$1');
$routes->get('departamentos/delete/(:num)', 'DepartamentoController::delete/$1');

$routes->get('municipios/index','MunicipioController::index');
$routes->get('municipios/create','MunicipioController::create');
$routes->post('municipios/store','MunicipioController::store');
$routes->get('municipios/edit/(:num)', 'MunicipioController::edit/$1');
$routes->post('municipios/update/(:num)', 'MunicipioController::update/$1');
$routes->get('municipios/delete/(:num)', 'MunicipioController::delete/$1');

$routes->get('niveles/index','NivelController::index');
$routes->get('niveles/create','NivelController::create');
$routes->post('niveles/store','NivelController::store');
$routes->get('niveles/edit/(:num)', 'NivelController::edit/$1');
$routes->post('niveles/update/(:num)', 'NivelController::update/$1');
$routes->get('niveles/delete/(:num)', 'NivelController::delete/$1');