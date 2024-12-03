<?php

namespace App\Http\Controllers\User\Cart;

use App\Contracts\Repositories\CartItemRepositoryInterface;
use App\Contracts\Repositories\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyCart extends Controller
{
    public function __invoke($id, CartRepositoryInterface $cartRepository): JsonResponse
    {
        $cart = $cartRepository->with('items')->find($id);

        foreach ($cart->items as $item) {
            app(CartItemRepositoryInterface::class)
                ->destroy($item->id);
        }

        app(CartRepositoryInterface::class)
            ->destroy($id);

        return ApiResponse::success(
            'cart and cart-items delete successfully'
        );
    }
}
