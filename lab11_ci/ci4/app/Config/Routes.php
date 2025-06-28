<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AutoRoute ON (boleh dipake pas development, tapi hati-hati di production)
$routes->setAutoRoute(true);

// --- STATIC ROUTES ---
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');

// --- AJAX CONTROLLER ---
$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');
$routes->post('ajax/tambah', 'AjaxController::tambah');
$routes->get('ajax/getArtikel/(:num)', 'AjaxController::getArtikel/$1');
$routes->post('ajax/update', 'AjaxController::update'); // INI BIARIN, TAPI TIDAK BERTABRAKAN DENGAN `post`

// --- RESOURCEFUL ROUTE ---
$routes->resource('post'); // Ini bakal otomatis buat route: index, show, create, update (PUT), delete, dll

// --- ARTIKEL BY KATEGORI ---
$routes->get('kategori/(:segment)', 'Artikel::kategori/$1');

// --- ADMIN ROUTES (Dengan Filter Auth) ---
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->put('artikel/edit/(:num)', 'Artikel::edit/$1'); // disederhanakan (gak perlu diawali "admin/" lagi)
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');

    // Redundant route dihapus, karena udah ada di atas
    // $routes->get('/admin/artikel', 'Artikel::admin_index'); ← ini duplikat
});
