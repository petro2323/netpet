<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/privacy', 'Home::privacy');
$routes->get('/ip-data', 'Home::fetch_ip_data');
