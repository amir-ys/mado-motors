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
use App\Http\Controllers\Agent\Product\MyProduct;
use App\Http\Controllers\Agent\Product\TransferProduct;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\ContactUS\IndexContactUS;
use App\Http\Controllers\User\Product\MyProduct as UserMyProduct;
use App\Http\Controllers\User\Product\ProductDetail;
use App\Http\Controllers\User\ProductReview\DestroyProductReview as UserDestroyProductReview;
use App\Http\Controllers\User\ProductReview\IndexDefaultReviewPoint;
use App\Http\Controllers\User\ProductReview\IndexProductReview as UserIndexProductReview;
use App\Http\Controllers\User\ProductReview\StoreProductReview;
use App\Http\Controllers\User\ProductReview\UpdateProductReview;
use App\Http\Controllers\User\User\UpdateUser;
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
            Route::get('my-products', MyProduct::class);
            Route::patch('my-products/transfer', TransferProduct::class);
        });
    });


Route::namespace('App\Http\Controllers\User')
    ->middleware('auth:api')
    ->prefix('user')
    ->group(callback: function () {

        Route::namespace('ProductReview')->group(callback: function () {
            Route::post('/product-reviews', StoreProductReview::class);
            Route::patch('/product-reviews/{productReview}', UpdateProductReview::class)->scopeBindings();
            Route::get('/review-points/default', IndexDefaultReviewPoint::class);
            Route::get('/product-reviews', UserIndexProductReview::class);
            Route::delete('/product-reviews/{productReview}', UserDestroyProductReview::class);
        });

        Route::namespace('Product')->group(callback: function () {
            Route::get('my-products', UserMyProduct::class);
            Route::get('my-product/details/{productDetail}', ProductDetail::class);
        });

        Route::namespace('User')->group(callback: function () {
            Route::patch('my-profile', UpdateUser::class);
        });

        Route::namespace('ContactUS')->group(callback: function () {
            Route::get('contact-us', IndexContactUS::class);
        });
    });
