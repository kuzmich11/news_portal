<?php

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController as UserIndexController;
use App\Http\Controllers\User\FeedbackController as UserFeedbackController;
use App\Http\Controllers\User\OrdersController as UserOrdersController;

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
Route::group(['prefix' => ''], static function () {
    Route::get('/', [HomePageController::class, 'index'])
        ->name('home_page');

    Route::get('/category/{id}/show', [CategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('category.show');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('/account', AccountIndexController::class)->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::group(['prefix' => 'user', 'as' => 'user.'], static function () {
    Route::get('/', [UserIndexController::class, 'index'])
        ->name('index');
    Route::resource('feedback', UserFeedbackController::class);
    Route::resource('orders', UserOrdersController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
