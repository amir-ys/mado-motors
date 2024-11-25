<?php

namespace App\Providers;

use App\Contracts\AttributeRepositoryInterface;
use App\Contracts\AttributeValueRepositoryInterface;
use App\Contracts\CommentRepositoryInterface;
use App\Contracts\ProductCategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
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
    ];
}
