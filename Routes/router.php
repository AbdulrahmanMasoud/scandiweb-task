<?php

use Scandiweb\Product\Router\Route;

Route::get('/', "ProductController@index");
Route::get('/add-product', "ProductController@create");
Route::post('/store-product', "ProductController@store");
Route::post('/mass-delete', "ProductController@delete");
