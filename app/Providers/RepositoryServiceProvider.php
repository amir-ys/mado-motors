<?php

namespace App\Providers;

use App\Contracts\AttributeRepositoryInterface;
use App\Contracts\AttributeValueRepositoryInterface;
use App\Contracts\CartItemRepositoryInterface;
use App\Contracts\CartRepositoryInterface;
use App\Contracts\CommentRepositoryInterface;
use App\Contracts\OrderItemRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\ProductCategoryRepositoryInterface;
use App\Contracts\ProductDetailRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\ProductReviewRepositoryInterface;
use App\Contracts\ReviewPointRepositoryInterface;
use App\Contracts\UserAddressRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;
use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use App\Repositories\CommentRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductDetailRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductReviewRepository;
use App\Repositories\ReviewPointRepository;
use App\Repositories\UserAddressRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProductCategoryRepositoryInterface::class => ProductCategoryRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        AttributeRepositoryInterface::class => AttributeRepository::class,
        AttributeValueRepositoryInterface::class => AttributeValueRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        CommentRepositoryInterface::class => CommentRepository::class,
        CartRepositoryInterface::class => CartRepository::class,
        CartItemRepositoryInterface::class => CartItemRepository::class,
        ReviewPointRepositoryInterface::class => ReviewPointRepository::class,
        UserAddressRepositoryInterface::class => UserAddressRepository::class,
        ProductReviewRepositoryInterface::class => ProductReviewRepository::class,
        OrderRepositoryInterface::class => OrderRepository::class,
        OrderItemRepositoryInterface::class => OrderItemRepository::class,
        ProductDetailRepositoryInterface::class => ProductDetailRepository::class,
    ];
}
