<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('/User', 'User::index');
$routes->get('/Admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/Admin/index', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/Admin/Detail/(:any)', 'Admin::Detail/$1');
$routes->get('/Admin/Edit/(:segment)', 'Admin::Edit/$1', ['filter' => 'role:Admin']);
$routes->post('/Admin/save/(:segment)', 'Admin::save/$1');
