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
$routes->get('/myPurchases', 'My_Purchases::index', ['filter' => 'auth']);

$routes->get('/thanks', 'Thanks::index');
$routes->get('/thanks/(:num)', 'Thanks::index/$1');


// -------- CRUD USUARIOS --------
$routes->get('/crudUsers', 'CrudUsers::index', ['filter' => 'adminAuth']);

$routes->get('/addUser', 'CrudUsers::new', ['filter' => 'adminAuth']);
$routes->post('/addUser', 'CrudUsers::create', ['filter' => 'adminAuth']);

$routes->get('/editUser/(:segment)', 'CrudUsers::edit/$1', ['filter' => 'adminAuth']);
$routes->put('/editUser/(:segment)', 'CrudUsers::update/$1', ['filter' => 'adminAuth']);
$routes->patch('/editUser/(:segment)', 'CrudUsers::update/$1', ['filter' => 'adminAuth']);

$routes->get('bajaUsuario/(:segment)', 'CrudUsers::bajaUsuario/$1', ['filter' => 'adminAuth']);
$routes->patch('bajaUsuario/(:segment)', 'CrudUsers::bajaUsuario/$1', ['filter' => 'adminAuth']);

$routes->get('altaUsuario/(:segment)', 'CrudUsers::altaUsuario/$1', ['filter' => 'adminAuth']);
$routes->patch('altaUsuario/(:segment)', 'CrudUsers::altaUsuario/$1', ['filter' => 'adminAuth']);

$routes->delete('/', 'CrudUsers::delete');


// -------- CRUD PRODUCTOS--------
$routes->get('/crudProductos', 'CrudProductos::index', ['filter' => 'adminAuth']);
$routes->get('/addProducto', 'CrudProductos::new', ['filter' => 'adminAuth']);
$routes->post('/addProducto', 'CrudProductos::create', ['filter' => 'adminAuth']);

$routes->get('editProducto/(:segment)', 'CrudProductos::edit/$1', ['filter' => 'adminAuth']);
$routes->put('editProducto/(:segment)', 'CrudProductos::update/$1', ['filter' => 'adminAuth']);
$routes->patch('editProducto/(:segment)', 'CrudProductos::update/$1', ['filter' => 'adminAuth']);

$routes->get('bajaProducto/(:segment)', 'CrudProductos::bajaProducto/$1', ['filter' => 'adminAuth']);
$routes->patch('bajaProducto/(:segment)', 'CrudProductos::bajaProducto/$1', ['filter' => 'adminAuth']);

$routes->get('altaProducto/(:segment)', 'CrudProductos::altaProducto/$1', ['filter' => 'adminAuth']);
$routes->patch('altaProducto/(:segment)', 'CrudProductos::altaProducto/$1', ['filter' => 'adminAuth']);


// -------- CRUD MARCAS --------
$routes->get('/crudMarcas', 'CrudMarcas::index', ['filter' => 'adminAuth']);
$routes->get('/addMarca', 'CrudMarcas::new', ['filter' => 'adminAuth']);
$routes->post('/addMarca', 'CrudMarcas::create', ['filter' => 'adminAuth']);

$routes->get('/editMarca/(:segment)', 'CrudMarcas::edit/$1', ['filter' => 'adminAuth']);
$routes->put('/editMarca/(:segment)', 'CrudMarcas::update/$1', ['filter' => 'adminAuth']);
$routes->patch('/editMarca/(:segment)', 'CrudMarcas::update/$1', ['filter' => 'adminAuth']);

$routes->get('bajaMarca/(:segment)', 'CrudMarcas::bajaMarca/$1', ['filter' => 'adminAuth']);
$routes->patch('bajaMarca/(:segment)', 'CrudMarcas::bajaMarca/$1', ['filter' => 'adminAuth']);

$routes->get('altaMarca/(:segment)', 'CrudMarcas::altaMarca/$1', ['filter' => 'adminAuth']);
$routes->patch('altaMarca/(:segment)', 'CrudMarcas::altaMarca/$1', ['filter' => 'adminAuth']);


// -------- CRUD VENTAS--------
$routes->get('/crudVentas', 'CrudVentas::index', ['filter' => 'adminAuth']);
$routes->get('crudVentas/detalle/(:num)', 'CrudVentas::detalle/$1', ['filter' => 'adminAuth']);

// -------- CRUD CONSULTAS--------
$routes->get('/crudConsultas', 'CrudConsultas::index', ['filter' => 'adminAuth']);


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

// -------- Factura --------
$routes->get('invoice/(:num)', 'InvoiceController::show/$1');
$routes->get('invoice/(:num)/download', 'InvoiceController::download/$1');

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
