<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::doLogin');

$routes->group('web', ['namespace' => 'App\Controllers', 'filter' => 'authGuard'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('users', 'Users::index');   // Route untuk menampilkan halaman user
    $routes->get('users/data', 'Users::getUsers');   // Route untuk mendapatkan data user
    $routes->get('logout', 'Auth::logout');   // Route untuk logout
});


//API
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->post('login', 'ApiLogin::login');
//    $routes->get('profile', 'ApiUser::profile');
});
//$routes->group('api', ['namespace' => 'App\Controllers\Api', 'filter' => 'auth'], function($routes) {
//    $routes->post('login', 'ApiLogin::login');
//    $routes->get('profile', 'ApiUser::profile');
//});



