<?php

namespace App\Http\Controllers\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\UpdateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;

class UpdateProductCategory extends Controller
{
    public function __invoke(ProductCategory $productCategory, UpdateProductCategoryRequest $updateProductCategoryRequest): ProductCategoryResource
    {
        return ProductCategoryResource::make(
            app(ProductCategoryRepositoryInterface::class)->update(
                $updateProductCategoryRequest->validated(),
                $productCategory->id
            )
        );
    }
}
