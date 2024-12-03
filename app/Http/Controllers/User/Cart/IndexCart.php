<?php

namespace App\Http\Controllers\User\Cart;

use App\Contracts\Repositories\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexCart extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            CartResource::collection(
                app(CartRepositoryInterface::class)
                    ->with(['user', 'items' , 'items.product' , 'items.productVariant'])
                    ->getByUserId(
                        auth()->id()
                    )
            )
        );
    }
}
