<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\UpdateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateProductCategory extends Controller
{
    public function __invoke($id, UpdateProductCategoryRequest $updateProductCategoryRequest): JsonResponse
    {
        return ApiResponse::success(
            ProductCategoryResource::make(
                app(ProductCategoryRepositoryInterface::class)->update(
                    $updateProductCategoryRequest->validated(),
                    $id
                )
            )
        );
    }
}
