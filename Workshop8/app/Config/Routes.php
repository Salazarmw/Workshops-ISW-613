<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/signup', 'User::signup');
$routes->post('user/register', 'User::create');

// $routes->get('product/(:num)/(:num)', 'Product::index/$1/$2');


