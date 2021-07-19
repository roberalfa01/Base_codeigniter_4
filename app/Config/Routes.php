<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
/*
$routes->group('usuarios'), ['App\Controller\user'],function($routes){
	
}
*/

$routes->group('', ['filter' => 'auth'], function($routes)
{
    $routes->get('usuarios/login', 'Usuarios::login', ['as' => 'usuarios/login']);
	$routes->post('usuarios/validar_login', 'Usuarios::validar_login', ['as' => 'usuarios/validar_login']);
	$routes->get('usuarios/registrarse', 'Usuarios::registrarse', ['as' => 'usuarios/registrarse']);
	$routes->post('usuarios/validar_registrarse', 'Usuarios::validar_registrarse', ['as' => 'usuarios/validar_registrarse']);
	$routes->post('usuarios/grabar_usuario', 'Usuarios::grabar_usuario', ['as' => 'usuarios/grabar_usuario']);
});

$routes->get('contacto', 'Home::contacto', ['as' => 'contacto']);
$routes->post('contacto_validar', 'Home::contacto_validar', ['as' => 'contacto_validar']);