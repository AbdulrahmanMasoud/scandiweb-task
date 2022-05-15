<?php

use Scandiweb\Product\Router\Route;

Route::get('/home/add-product', function () {
    echo "here";
});

Route::get('/home/{id}', "ProductController@here");
