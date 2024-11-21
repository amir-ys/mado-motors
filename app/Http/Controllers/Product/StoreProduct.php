<?php

namespace App\Http\Controllers\Product;

use App\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;

class StoreProduct extends Controller
{
    public function __invoke(CreateProductRequest $createProductRequest): ProductResource
    {
        return ProductResource::make(
            app(ProductRepositoryInterface::class)->store(
                $createProductRequest->only(['title', 'title_en', 'summary', 'category_id', 'description', 'variations'])
            )
        );
    }
}
