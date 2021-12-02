<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@index');
Route::get('create', 'ProductController@create');
Route::post('', 'ProductController@store')->name('product-store');
Route::get('{productId}/edit', 'ProductController@edit');
Route::put('{productId}', 'ProductController@update')->name('product-update');
Route::delete('{productId}', 'ProductController@delete');
