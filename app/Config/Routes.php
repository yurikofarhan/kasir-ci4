<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Login::index', ['filter' => 'noauth']);
$routes->group('/', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'dashboard::index');
    $routes->add('profile', 'User::profile');
    $routes->group('menu',  function ($routes) {
        $routes->get('/',  'Menu::index');
        $routes->post('create', 'Menu::create', ['filter' => 'manajer']);
        $routes->add('(:segment)/update', 'Menu::update/$1', ['filter' => 'manajer']);
        $routes->post('(:segment)/delete', 'Menu::delete/$1', ['filter' => 'manajer']);
        $routes->post('(:segment)/pesan', 'Menu::actionPesan/$1', ['filter' => 'kasir']);
    });
    $routes->group('pesanan', ['filter' => 'kasir'], function ($routes) {
        $routes->add('/', 'DetailOrder::index');
        $routes->post('(:segment)/delete', 'DetailOrder::delete/$1/$2');
        $routes->post('checkout', 'DetailOrder::checkout');
    });
    $routes->group('order/manajer', ['filter' => 'manajer'], function ($routes) {
        $routes->add('/', 'Order::index');
        $routes->add('(:segment)/delete', 'Order::delete/$1');
    });
    $routes->group('order/kasir', ['filter' => 'kasir'], function ($routes) {
        $routes->add('/', 'Order::index');
        $routes->add('(:segment)/delete', 'Order::delete/$1');
    });
    $routes->group('akun', ['filter' => 'admin'], function ($routes) {
        $routes->get('/', 'User::index');
        $routes->post('create', 'User::Create');
        // $routes->post('(:segment)/update', 'User::update/$1'); update modal
        $routes->add('(:segment)/update', 'User::update2/$1');
        $routes->post('(:segment)/delete', 'User::delete/$1');
    });
    $routes->group('transaksi', function ($routes) {
        $routes->add('/', 'Transaksi::index');
        $routes->post('tanggal', 'Transaksi::filterTanggal');

        $routes->add('(:segment)/invoice', 'Transaksi::invoice/$1');
    });
    $routes->group('log-aktivitas', function ($routes) {
        $routes->add('/', 'LogAktivitas::index');
        $routes->post('(:segment)/delete', 'LogAktivitas::delete/$1');
    });

    $routes->get('logout', 'Login::Logout');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
