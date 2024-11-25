<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\StoreProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreProductCategory extends Controller
{
    public function __invoke(StoreProductCategoryRequest $createProductCategoryRequest): JsonResponse
    {
        return ApiResponse::created(
            ProductCategoryResource::make(
                app(ProductCategoryRepositoryInterface::class)->create(
                    $createProductCategoryRequest->validated()
                )
            )
        );
    }
}
