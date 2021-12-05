<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@index')->name('product-list');
Route::get('search', 'ProductController@search');
Route::get('create', 'ProductController@create')->name('product-create');
Route::post('', 'ProductController@store')->name('product-store');
Route::get('{productId}/edit', 'ProductController@edit')->name('product-edit');
Route::put('{productId}', 'ProductController@update')->name('product-update');
Route::delete('{productId}', 'ProductController@delete');
