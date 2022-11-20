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

Route::get('/', function () {
    return view('welcome');
});

Route::get('orders', ['App\Http\Controllers\Orders', 'index']);
Route::get('add-order', ['App\Http\Controllers\Orders', 'create']);
Route::post('add-order', ['App\Http\Controllers\Orders', 'store']);