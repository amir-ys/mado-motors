<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Admin')->group(function () {

    Route::namespace('User')->group(function () {
        Route::handler('users');
    });

    Route::namespace('ProductCategory')->group(function () {
        Route::handler('product-categories');
    });

    Route::namespace('Attribute')->group(function () {
        Route::handler('attributes');
    });

    Route::namespace('AttributeValue')->group(function () {
        Route::handler('attribute-values');
    });

    Route::namespace('Product')->group(function () {
        Route::handler('products');
    });

});

