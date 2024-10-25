<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal: Redirige al Login por defecto
$routes->get('/', 'LoginController::index');

// Rutas de autenticación
$routes->post('/login', 'LoginController::authenticate'); // Procesa el formulario de login
$routes->get('/logout', 'LoginController::logout');       // Cierra la sesión

// Ruta para el menú principal
$routes->get('/menu', 'MenuController::index');           // Asegúrate de tener un controlador para esta ruta

// Rutas para gestión de insumos
$routes->get('/insumos', 'InsumosController::index');
$routes->get('/insumos/create', 'InsumosController::create');
$routes->post('/insumos/store', 'InsumosController::store');
$routes->get('/insumos/edit/(:num)', 'InsumosController::edit/$1');
$routes->post('/insumos/update/(:num)', 'InsumosController::update/$1');

// Rutas para gestión de cirugías
$routes->get('/cirugias', 'CirugiasController::index');
$routes->get('/cirugias/create', 'CirugiasController::create');
$routes->post('/cirugias/store', 'CirugiasController::store');
$routes->get('/cirugias/edit/(:num)', 'CirugiasController::edit/$1');
$routes->post('/cirugias/update/(:num)', 'CirugiasController::update/$1');
$routes->get('/cirugias/delete/(:num)', 'CirugiasController::delete/$1');

// Rutas para Trazabilidad
$routes->get('/trazabilidad', 'TrazabilidadController::index');
$routes->get('/trazabilidad/detalle/(:num)', 'TrazabilidadController::detalle/$1');

// Rutas para Reportes
$routes->get('/reportes/consumos', 'ReportesController::consumos');
$routes->get('/reportes/stock', 'ReportesController::stock');
