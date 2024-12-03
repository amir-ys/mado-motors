<?php

namespace App\Http\Controllers\User\Product;

use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ProductDetail extends Controller
{
    public function __invoke($productDetailId): JsonResponse
    {
        return ApiResponse::success(
            ProductDetailResource::make(
                app(ProductDetailRepositoryInterface::class)
                    ->with(['order', 'owner', 'agent', 'product'])
                    ->find($productDetailId)
            )
        );
    }
}
