<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexProduct extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            ProductResource::collection(
                app(ProductRepositoryInterface::class)->index()
            )
        );
    }
}
