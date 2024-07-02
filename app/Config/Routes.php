<?php

namespace Config;
use CodeIgniter\Router\RouteCollection;

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
$routes->get('/about_us', 'About_Us::index');
$routes->get('/catalogue', 'Catalogue::index');
$routes->get('/details/(:segment)', 'Details::index/$1');
$routes->get('/commercialization', 'Commercialization::index');

$routes->get('/contact', 'Contact::index');
$routes->post('/contact', 'Contact::send');

$routes->get('/termsAndUses', 'Terms_And_Uses::index');
$routes->get('/thanks', 'Thanks::index');

// -------- CRUD USUARIOS --------
$routes->get('/crudUsers', 'CrudUsers::index', ['filter' => 'auth']);

// $routes->get('/addUser', 'CrudUsers::new', ['filter' => 'auth']);
// $routes->post('/addUser', 'CrudUsers::create', ['filter' => 'auth']);

// $routes->get('/editUser/(:segment)', 'CrudUsers::edit/$1', ['filter' => 'auth']);
// $routes->put('/editUser/(:segment)', 'CrudUsers::update/$1', ['filter' => 'auth']);
// $routes->patch('/editUser/(:segment)', 'CrudUsers::update/$1', ['filter' => 'auth']);

$routes->get('bajaUsuario/(:segment)', 'CrudUsers::bajaUsuario/$1', ['filter' => 'auth']);
$routes->patch('bajaUsuario/(:segment)', 'CrudUsers::bajaUsuario/$1', ['filter' => 'auth']);

$routes->get('altaUsuario/(:segment)', 'CrudUsers::altaUsuario/$1', ['filter' => 'auth']);
$routes->patch('altaUsuario/(:segment)', 'CrudUsers::altaUsuario/$1', ['filter' => 'auth']);

$routes->delete('/', 'CrudUsers::delete');

// -------- CRUD PRODUCTOS--------
$routes->get('/crudProductos', 'CrudProductos::index', ['filter' => 'auth']);
$routes->get('/addProducto', 'CrudProductos::new', ['filter' => 'auth']);
$routes->post('/addProducto', 'CrudProductos::create', ['filter' => 'auth']);

// $routes->get('/editUser/(:segment)', 'CrudProductos::edit/$1', ['filter' => 'auth']);
// $routes->put('/editUser/(:segment)', 'CrudProductos::update/$1', ['filter' => 'auth']);
// $routes->patch('/editUser/(:segment)', 'CrudProductos::update/$1', ['filter' => 'auth']);

$routes->get('bajaProducto/(:segment)', 'CrudProductos::bajaProducto/$1', ['filter' => 'auth']);
$routes->patch('bajaProducto/(:segment)', 'CrudProductos::bajaProducto/$1', ['filter' => 'auth']);

$routes->get('altaProducto/(:segment)', 'CrudProductos::altaProducto/$1', ['filter' => 'auth']);
$routes->patch('altaProducto/(:segment)', 'CrudProductos::altaProducto/$1', ['filter' => 'auth']);


// -------- CRUD VENTAS--------
$routes->get('/crudVentas', 'CrudVentas::index', ['filter' => 'auth']);

// -------- CRUD CONSULTAS--------
$routes->get('/crudConsultas', 'CrudConsultas::index', ['filter' => 'auth']);


// $routes->resource('crudUsers', ['placeholder' => '(:num)', 'except' => 'show']);


// -------- LOGIN --------
$routes->get('/login', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('logout', 'Login::logout');
$routes->get('/register', 'Users::index');
$routes->post('/register', 'Users::create');


// -------- CARRITO --------
$routes->get('/carrito', 'Cart::index');
$routes->get('/add/(:segment)', 'Cart::add/$1');
$routes->get('/checkout/(:segment)', 'Cart::checkout/$1');
$routes->get('/remove/(:segment)', 'Cart::remove/$1');
$routes->post('/update', 'Cart::update');
$routes->get('/destroy', 'Cart::destroy');
$routes->get('/buy', 'Cart::buy', ['filter' => 'auth']);

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
