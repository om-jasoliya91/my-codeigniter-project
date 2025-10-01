<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// show form
$routes->get('register', 'Home::register');

// AJAX validation
$routes->post('validate-form', 'Home::validates');
