<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreProduct extends Controller
{
    public function __invoke(CreateProductRequest $createProductRequest): JsonResponse
    {
        return ApiResponse::created(
            ProductResource::make(
                app(ProductRepositoryInterface::class)->store(
                    ($createProductRequest->validated())
                )
            )
        );
    }
}
