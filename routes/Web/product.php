<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@index');
Route::get('create', 'ProductController@create')->name('product-create');;
Route::post('', 'ProductController@store')->name('product-store');
Route::get('{productId}/edit', 'ProductController@edit')->name('product-edit');
Route::get('{productId}/detail', 'ProductController@detail')->name('product-detail');
Route::put('{productId}', 'ProductController@update')->name('product-update');
Route::delete('{productId}', 'ProductController@delete');
