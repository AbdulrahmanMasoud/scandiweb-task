<?php

use Scandiweb\Product\Router\Route;

Route::get('/', "ProductController@index");
Route::get('/add-product', "ProductController@addProduct");
