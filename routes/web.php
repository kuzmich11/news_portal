<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomePageController::class, 'index'])
    ->name('home_page');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category');

Route::get('/category/{id}/show', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
