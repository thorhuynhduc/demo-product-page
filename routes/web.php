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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::namespace('Web')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', 'HomeController@login')->name('login');
        Route::post('/', 'HomeController@doLogin');
        Route::get('/logout', 'HomeController@logout')->name('logout');
    });

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@search');
    Route::get('{productId}/detail', 'HomeController@detail')->name('product-detail');

    Route::prefix('cart')->group(function () {
        Route::get('', 'CartController@index')->name('cart');
        Route::post('add', 'CartController@add');
        Route::delete('{productId}', 'CartController@remove');
    });

    Route::prefix('product')->middleware('admin')->group(function () {
        require __DIR__ . '/Web/product.php';
    });
    Route::prefix('brand')->group(function () {
        require __DIR__ . '/Web/brand.php';
    });
    Route::prefix('image')->group(function () {
        require __DIR__ . '/Web/image.php';
    });
});
