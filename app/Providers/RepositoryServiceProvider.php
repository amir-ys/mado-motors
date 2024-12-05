<?php

namespace App\Providers;

use App\Contracts\Repositories\AgentRepositoryInterface;
use App\Contracts\Repositories\AttributeRepositoryInterface;
use App\Contracts\Repositories\AttributeValueRepositoryInterface;
use App\Contracts\Repositories\CartItemRepositoryInterface;
use App\Contracts\Repositories\CartRepositoryInterface;
use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\OrderItemRepositoryInterface;
use App\Contracts\Repositories\OrderRepositoryInterface;
use App\Contracts\Repositories\ProductCategoryRepositoryInterface;
use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Contracts\Repositories\ProductVariantRepositoryInterface;
use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\AgentRepository;
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
use App\Repositories\ProductVariantRepository;
use App\Repositories\ReviewPointRepository;
use App\Repositories\SettingRepository;
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
        AgentRepositoryInterface::class => AgentRepository::class,
        SettingRepositoryInterface::class => SettingRepository::class,
        ProductVariantRepositoryInterface::class => ProductVariantRepository::class,
    ];
}
