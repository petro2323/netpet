<?php

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\HTTP\Response;

/**
 * @var RouteCollection $routes
 */

 $routes->set404Override(function(){
    $error = new \App\Controllers\Error();
    return $error->error_message('Page Not Found', Response::HTTP_NOT_FOUND);
});

$routes->get('/', 'Home::index');
$routes->get('/privacy', 'Home::privacy');
$routes->get('/ip-data', 'Home::fetch_ip_data');