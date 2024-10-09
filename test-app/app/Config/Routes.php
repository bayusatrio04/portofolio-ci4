<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Untuk Portofolio
$routes->get('/blog', 'Blog::index');

$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');

//Untuk Portofolio

//Untuk CRUD
$routes->get('/employees/create', 'Employees::create');
$routes->post('employees/store', 'Employees::store');


$routes->get('/employees', 'Employees::index');

$routes->get('/employees/(:segment)', 'Employees::detail/$1');

$routes->get('/employees/edit/(:segment)', 'Employees::edit/$1');
$routes->post('/employees/update/(:num)', 'Employees::update/$1');



$routes->delete('/employees/delete/(:num)', 'Employees::delete/$1');


//Untuk CRUD
