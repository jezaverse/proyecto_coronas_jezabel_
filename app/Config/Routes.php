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
$routes->setAutoRoute(true);

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
//Llamo a los metodos
//'/views', 'Home::metodoenhome'

//VISTAS
$routes->get('/', 'Home::index');
$routes->get('/nueva_plantilla', 'Home::index');
$routes->get('/quienes_somos', 'Home::llamarQuienesSomos');
$routes->get('/comercializacion', 'Home::llamarComercializacion');
$routes->get('/terminos_usos', 'Home::llamarTerminosUsos');
$routes->get('/contacto', 'Home::llamarContacto');
$routes->get('/registro_usuario_view', 'Home::llamarRegistroUsuario');
$routes->get('/catalogo_productos_view', 'Home:: llamarCatalogoProductos');

//USUARIO  (Registro y Consultas)
$routes->post('/registro_usuario', 'UserController::registrar_usuario');
$routes->post('/registro_consulta', 'UserController::registrar_consulta');

//Falta ruta para visualizar las consultas(la lista)
$routes->get('ver_consultas', 'Home::verConsultas');

//INICIO SESION
$routes->get('login', 'LoginController::ver_login');
$routes->post('authlogin', 'LoginController::login_usuario');
$routes->get('logout', 'LoginController::cerrar_sesion');

//PRODUCTOS
$routes->get('agregar', 'ProductController:: form_agregar_producto');
$routes->post('insertar_producto', 'ProductController::registrar_producto');
$routes->get('productos', 'ProductController:: listar_productos');


// Mostrar productos en el Catálogo
$routes->get('/catalogo', 'CartController::catalogo_productos_view');

// Carrito 
$routes->post('add_cart', 'CartController::agregar_carrito');

$routes->get('/ver_carrito', 'CartController::ver_carrito');
//$routes->post('/agregar_carrito', 'cartController::add');
//$routes->get('carrito_elimina/(:any)','cartController::remove/$1');

//eliminar todo el carrito
$routes->get('/borrar','cartController::borrar_carrito');

//muestra las compras una vez que realizamos la misma
$routes->get('/carrito-comprar', 'ventasController::registrar_venta');


//Rutas ventas
$routes->get('/ventas', 'ventasController::ventas');



// SINTAXIS $routes->get('/nombreRuta', 'Home::nombreFuncion');

/*usuario */

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
