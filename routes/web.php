<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')->namespace('Admin')
->middleware('auth', 'justadmin')
->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard.admin');
    Route::resource('manageuser', 'ManageUserController');
    Route::resource('lapangan-admin', 'LapanganAdminController');
    Route::resource('booking', 'BookingController');

    // filter
    Route::get('/filterlapangan/bagian-admin/byfutsal', 'FilterAdminController@byfutsaladmin')->name('byfutsaladmin');
    Route::get('/filterlapangan/bagian-admin/bybulutangkis', 'FilterAdminController@bybulu_tangkis')->name('bybulutangkisadmin');
    Route::get('/filterlapangan/bagian-admin/bybasket', 'FilterAdminController@bybasket')->name('bybasketadmin');
    Route::get('/filterlapangan/bagian-admin/byrate', 'FilterAdminController@byrate')->name('byrateadmin');
});

Route::prefix('pengelolaan')->namespace('Pengelola')
->middleware('auth', 'pengelolaan')
->group(function(){
    Route::get('/', 'DashboardController@dashbaord_pengelola')->name('dashboard.pengelola');
    Route::resource('lapangan-pengelola', 'LapanganController');
    Route::resource('bookingan', 'BookingController');
    Route::resource('datadiripengelola', 'DataDiriPengelolaController');

    // controller filter
    Route::get('/filter-lapangan/byfutsal', 'FilterController@byfutsal')->name('byfutsal');
    Route::get('/filter-lapangan/bybulutangkis', 'FilterController@bybulutangkis')->name('bybulutangkis');
    Route::get('/filter-lapangan/bybasekt', 'FilterController@bybasket')->name('bybasket');
    Route::get('/filter-lapangan/byrate', 'FilterController@byrate')->name('byrate');

    // perhitungan metode
    Route::get('/perhitungan/metode', 'PerhitunganMetode@perhitungan')->name('perhitungan.metode');
});


Route::prefix('customer')->namespace('Customer')
->middleware('auth', 'customer')
->group(function(){
    Route::get('/', 'DashboardController@dashboard_customer')->name('dashboard.customer');

    //datadiri
    Route::resource('datadiricustomer', 'DataDiriController');


    Route::get('/filter-lapangan/byfutsalcustomer', 'FilterLapanganController@byfutsalcustomer')->name('byfutsalcustomer');
    Route::get('/filter-lapangan/bybulutangkiscustomer', 'FilterLapanganController@bybulutangkiscustomer')->name('bybulutangkiscustomer');
    Route::get('/filter-lapangan/bybasketcustomer', 'FilterLapanganController@bybasketcustomer')->name('bybasketcustomer');
    Route::get('/filter-lapangan/byratecustomer', 'FilterLapanganController@byratecustomer')->name('byratecustomer');
    Route::get('/filter-lapangan/byharga_sewa', 'FilterLapanganController@byharga_sewa')->name('byharga_sewa');


    // lapangan
    Route::get('/seluruhlapangan', 'LapanganController@semua_lapangan')->name('semualapangan');
    Route::get('/order-lapangan/{id}', 'LapanganController@halaman_input_tambahan_booking')->name('halaman-input-tambahan');
    Route::post('/proses-booking/{id}', 'LapanganController@proses_booking')->name('proses-booking');
    Route::get('/data/bookingan-lapangan', 'LapanganController@data_bookingan_customer')->name('databookingan.csutomer');
    Route::get('/halamaninputrating/lapangan/{id}', 'LapanganController@rate_lapangan')->name('halama-input-rate.customer');
    Route::put('/proses-input_rate/lapangan/{id}', 'LapanganController@input_rate')->name('proses-input-rate-lapangan');
    Route::post('/proses-pengembalian/lapangan/{id}', 'LapanganController@pengembalian')->name('pengembalian-lapangan');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
