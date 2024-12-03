<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowProduct extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            ProductResource::make(
                app(ProductRepositoryInterface::class)->show($id)
            )
        );
    }
}
