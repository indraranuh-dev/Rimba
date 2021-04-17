<?php

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

Route::group([
    'prefix' => 'admin/barang',
    'middleware' => 'auth',
    'as' => 'adm.item.',
], function () {
    Route::get('/', 'ItemController@index')->name('index');
});