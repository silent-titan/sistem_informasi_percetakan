<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->get('/', 'AuthController::index');
$routes->setTranslateURIDashes(false);

// =======================
// AUTH ADMIN & KARYAWAN
// =======================
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attempt');
$routes->get('/logout', 'AuthController::logout');

// =======================
// ADMIN AREA
// =======================
    $routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Modul Admin
    $routes->resource('users', ['controller' => 'Admin\UsersController']);
    $routes->delete('layanan/(:num)', 'Admin\LayananController::delete/$1');
    $routes->get('layanan', 'Admin\LayananController::index');
    $routes->get('layanan/create', 'Admin\LayananController::create');
    $routes->post('layanan/store', 'Admin\LayananController::store');
    $routes->get('layanan/edit/(:num)', 'Admin\LayananController::edit/$1');
    $routes->post('layanan/update/(:num)', 'Admin\LayananController::update/$1');
    $routes->get('layanan/delete/(:num)', 'Admin\LayananController::delete/$1');
    $routes->resource('pelanggan', ['controller' => 'Admin\PelangganController']);
    $routes->resource('bahan', ['controller' => 'Admin\BahanController']);
    $routes->resource('supplier', ['controller' => 'Admin\SupplierController']);
    $routes->resource('transaksi', ['controller' => 'Admin\TransaksiController']);
    $routes->post('transaksi/(:num)/additem', 'Admin\TransaksiController::addItem/$1');
    $routes->post('transaksi/(:num)/updatestatus', 'Admin\TransaksiController::updateStatus/$1');
    $routes->resource('pembayaran', ['controller' => 'Admin\PembayaranController']);
    $routes->post('admin/pembayaran/store', 'Admin\PembayaranController::store');
    $routes->get('admin/pembayaran/create', 'Admin\PembayaranController::create');
    $routes->post('admin/pembayaran/store', 'Admin\PembayaranController::store');
    $routes->resource('pembelian', ['controller' => 'Admin\PembelianController']);
    $routes->delete('admin/pembelian/(:num)', 'Admin\PembelianController::delete/$1');
    $routes->resource('detail_pesanan', ['controller' => 'Admin\DetailPesananController']);
    $routes->resource('detail-pesanan', ['controller' => 'Admin\DetailPesananController']);
    $routes->resource('detail_pembelian', ['controller' => 'Admin\DetailPembelianController']);
    $routes->resource('detail-pembelian', ['controller' => 'Admin\DetailPembelianController']);
    $routes->resource('log_revisi', ['controller' => 'Admin\LogRevisiController']);
    $routes->resource('log-revisi', ['controller' => 'Admin\LogRevisiController']);
});

// =======================
// KARYAWAN AREA
// =======================
$routes->group('karyawan', ['filter' => 'auth', 'filter' => 'role:karyawan'], function($routes) {
    $routes->get('dashboard', 'Karyawan\DashboardController::index');
    $routes->resource('transaksi', ['controller' => 'Karyawan\TransaksiController']);
    $routes->resource('pembayaran', ['controller' => 'Karyawan\PembayaranController']);
    $routes->get('bahan', 'Karyawan\BahanController::index'); // read-only
});

// =======================
// PELANGGAN AUTH
// =======================
// Login
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');

// Register
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');

// Logout
$routes->get('logout', 'AuthController::logout');

// =======================
// PELANGGAN AREA
// =======================
$routes->group('pelanggan', ['filter' => 'auth', 'filter' => 'role:pelanggan'], function($routes) {
    $routes->get('dashboard', 'Pelanggan\DashboardController::index');
    $routes->post('dashboard/beli', 'Pelanggan\DashboardController::beli');
    $routes->get('tracking/(:segment)', 'Pelanggan\PesananController::tracking/$1');
    // Pesanan pelanggan
    $routes->resource('pesanan', ['controller' => 'Pelanggan\PesananController']);
    $routes->get('pesanan/(:num)', 'Pelanggan\PesananController::show/$1');

    // Tracking pesanan
    $routes->get('tracking/(:segment)', 'Pelanggan\PesananController::tracking/$1');

});