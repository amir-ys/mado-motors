<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ShowProduct extends Controller
{
    public function __invoke(Product $product): ProductResource
    {
        return ProductResource::make(
            app(ProductRepositoryInterface::class)->show($product->id)
        );
    }

    public function show(Product $product): ProductResource
    {
        return ProductResource::make(
            app(ProductRepositoryInterface::class)->showOnline($product->id)
        );
    }
}
