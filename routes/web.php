<?php

use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/admin', function () {
    return view('dashboard');
})->middleware('auth')->name('adm.index');

Route::redirect('/', '/admin');

Auth::routes(['verify' => false]);

Route::get('/images/items/{imageName}', [MediaController::class, 'getItemImage'])->name('getItemImage');
Route::get('/images/customers/{imageName}', [MediaController::class, 'getCustomerImage'])->name('getCustomerImage');