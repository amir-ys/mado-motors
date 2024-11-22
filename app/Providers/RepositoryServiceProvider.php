<?php

namespace App\Providers;

use App\Contracts\AttributeRepositoryInterface;
use App\Contracts\ProductCategoryRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\AttributeRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProductCategoryRepositoryInterface::class => ProductCategoryRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        AttributeRepositoryInterface::class => AttributeRepository::class,
    ];
}
