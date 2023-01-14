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

Route::get('/home', function () {
    return "Home";
});

Route::get('/info', function () {
    return "INFO";
});

Route::get('/news', function () {
    return "NEWS";
});

Route::get('/news/{id}', static function (int $id) {
    return "NEWS {$id}";
});