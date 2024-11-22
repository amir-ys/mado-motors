<?php

namespace App\Providers;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProductCategoryRepositoryInterface::class => ProductCategoryRepository::class
    ];
}
