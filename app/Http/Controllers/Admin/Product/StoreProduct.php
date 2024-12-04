<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreProduct extends Controller
{
    public function __invoke(CreateProductRequest $createProductRequest): JsonResponse
    {
        $data  = $createProductRequest->validated();
        $data['creator_id'] = auth()->id();
        return ApiResponse::created(
            ProductResource::make(
                app(ProductRepositoryInterface::class)->store(
                   $data
                )
            )
        );
    }
}
