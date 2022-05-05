<?php

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

Route::get('/', 'indexControl@showPrincipal')->name('principal');

Route::group(['prefix' => 'productos'], function () {
    Route::get('/ver', 'productosControl@showProductos')->name('showPro');
    Route::post('/store', 'productosControl@addProducto')->name('addPro');
    Route::post('/modificar', 'productosControl@modPro')->name('modPro');
    Route::delete('admin/post/{id}/delete', 'productosControl@delete')->name('admin.delete');
});
Route::group(['prefix' => 'clientes'], function () {
    Route::get('/ver', 'clienteControl@showClientes')->name('showCli');
    Route::post('/store', 'clienteControl@addCliente')->name('addCli');
    Route::post('/mod', 'clienteControl@modCli')->name('modCli');
    Route::delete('cliente/{id}/delete', 'clienteControl@delete')->name('deleteCli');
});
Route::group(['prefix' => 'ventas'], function () {
    Route::get('/ver', 'ventaControl@showVenta')->name('showVenta');
    Route::get('/consul/{id?}', 'ventaControl@consultarProducto')->name('consultar');
    Route::post('/store', 'ventaControl@ventaStore')->name('addV');
});
Route::group(['prefix' => 'reportes'], function () {
    Route::get('/ver', 'reportesControl@showR')->name('showReports');
    Route::post('/PDF/cleinte', 'reportesControl@generarReporte')->name('genCli');
    Route::post('/PDF/producto', 'reportesControl@generarReporteProducto')->name('genRep');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
