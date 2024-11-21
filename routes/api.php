<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {

    Route::namespace('User')->group(function () {
        Route::handler('users');
    });


});

