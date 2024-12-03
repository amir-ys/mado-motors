<?php

namespace App\Http\Controllers\User\Product;

use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class MyProduct extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            ProductDetailResource::collection(
                app(ProductDetailRepositoryInterface::class)->getByUserId(
                    userId: auth()->id()
                )
            )
        );
    }
}
