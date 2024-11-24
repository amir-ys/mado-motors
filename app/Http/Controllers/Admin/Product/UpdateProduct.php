<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateProduct extends Controller
{
    public function __invoke(
        $id,
        UpdateProductRequest $updateProductRequest
    ): JsonResponse
    {
        return ApiResponse::success(
            ProductResource::make(
                app(ProductRepositoryInterface::class)->update(
                    $updateProductRequest->validated(),
                    $id
                )
            )
        );
    }
}
