<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Contracts\Repositories\CartItemRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartItemResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexCartItem extends Controller
{
    public function __invoke($cartId): JsonResponse
    {
        return ApiResponse::success(
            data: CartItemResource::collection(
                app(CartItemRepositoryInterface::class)->getByCartId(
                    $cartId
                )
            )
        );
    }
}
