<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'BrandController@index');
Route::get('create', 'BrandController@create');
Route::post('', 'BrandController@store');
Route::get('{brandId}/edit', 'BrandController@edit');
Route::put('{brandId}', 'BrandController@update');
Route::delete('{brandId}', 'BrandController@delete');
