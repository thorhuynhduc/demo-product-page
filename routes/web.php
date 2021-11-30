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
    return view('home');
});

Route::prefix('product')->group(function () {
    Route::get('{productId}/detail', function () {
        return view('product.detail');
    });
});

Route::prefix('management')->group(function () {
//    Route::middleware(['management'])->group(function () {
//
//    });
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return view('product.list');
        });
        Route::get('create', function () {
            return view('product.create');
        });
        Route::get('{productId}/edit', function () {
            return view('product.edit');
        });
        Route::post('', function () {
        });
        Route::put('{productId}', function () {
        });
        Route::delete('{productId}', function () {
        });
    });

    Route::prefix('brand')->group(function () {
        Route::get('/', function () {
            return view('brand.list');
        });
        Route::get('create', function () {
            return view('brand.create');
        });
        Route::get('{brandId}/edit', function () {
            return view('brand.edit');
        });
        Route::post('', function () {
        });
        Route::put('{brandId}', function () {
        });
        Route::delete('{brandId}', function () {
        });
    });
});



