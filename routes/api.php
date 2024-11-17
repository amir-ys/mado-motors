<?php

use App\Http\Controllers\Api\V1\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    # categories
    Route::apiResource('categories', CategoryController::class)
        ->names('api.v1.admin.categories');

});
