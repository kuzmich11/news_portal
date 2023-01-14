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

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/home', static function () {
    return "Home";
});

Route::get('/info', static function () {
    return "INFO";
});

Route::get('/news', static function () {
    return "NEWS";
});

Route::get('/news/{id}', static function (int $id) {
    return "NEWS {$id}";
});
