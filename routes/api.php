<?php

use App\Http\Controllers\Admin\Cart\IndexCart;
use App\Http\Controllers\Admin\Cart\IndexCartItem;
use App\Http\Controllers\Admin\Comment\ChangeCommentStatus;
use App\Http\Controllers\Admin\Comment\IndexComment;
use App\Http\Controllers\Admin\Comment\ShowComment;
use App\Http\Controllers\Admin\Order\DestroyOrder;
use App\Http\Controllers\Admin\Order\IndexOrder;
use App\Http\Controllers\Admin\Order\ShowOrder;
use App\Http\Controllers\Admin\Order\UpdateOrder;
use App\Http\Controllers\Admin\Product\Assign\StoreProductDetail;
use App\Http\Controllers\Admin\ProductReview\DestroyProductReview;
use App\Http\Controllers\Admin\ProductReview\IndexProductReview;
use App\Http\Controllers\Admin\ProductReview\ShowProductReview;
use App\Http\Controllers\Agent\Product\IndexProduct;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Admin')
    ->group(function () {

        #auth
        Route::post('register', [RegisterController::class, 'store']);
        Route::post('login', [LoginController::class, 'store']);

    });

Route::namespace('App\Http\Controllers\Admin')
    ->middleware('auth:api')
    ->group(function () {

        Route::namespace('Media')->group(function () {
            Route::post('media', 'StoreMedia');
            Route::post('file', 'StoreMedia@store');
            Route::delete('media/{media}', 'DestroyMedia');
        });

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
            Route::post('/products/assign', StoreProductDetail::class);
//            Route::get('transfer', StoreProductDetail::class);
        });

        Route::namespace('ProductReview')->group(function () {
            Route::get('products/{product}/product-reviews', IndexProductReview::class);
            Route::get('product-reviews/{productReview}', ShowProductReview::class);
            Route::delete('product-reviews/{productReview}', DestroyProductReview::class);
        });

        Route::namespace('Comment')->group(callback: function () {
            Route::get('comments', IndexComment::class);
            Route::get('comments/{comment}', ShowComment::class);
            Route::patch('comments/{comment}/change-status', ChangeCommentStatus::class);
        });

        Route::namespace('Cart')->group(callback: function () {
            Route::get('carts', IndexCart::class);
            Route::get('cart-items/{cart}', IndexCartItem::class);
        });

        Route::namespace('ReviewPoint')->group(function () {
            Route::handler('review-points');
        });

        Route::namespace('Order')->group(callback: function () {
            Route::get('orders', IndexOrder::class);
            Route::get('orders/{order}', ShowOrder::class);
            Route::delete('orders/{order}', DestroyOrder::class);
            Route::put('orders/{order}', UpdateOrder::class);
        });
    });


Route::namespace('App\Http\Controllers\Agent')
    ->middleware('auth:api')
    ->prefix('agent')
    ->group(function () {

        Route::namespace('Product')->group(callback: function () {
            Route::get('my-products', IndexProduct::class);
        });
    });
