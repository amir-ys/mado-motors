<?php

namespace App\Http\Controllers\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\CreateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;

class StoreProductCategory extends Controller
{
    public function __invoke(CreateProductCategoryRequest $createProductCategoryRequest): ProductCategoryResource
    {
        return ProductCategoryResource::make(
            app(ProductCategoryRepositoryInterface::class)->store(
                $createProductCategoryRequest->validated()
            )
        );
    }
}
