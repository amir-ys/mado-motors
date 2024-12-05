<?php

namespace App\Http\Controllers\User\Cart;

use App\Contracts\Repositories\CartItemRepositoryInterface;
use App\Contracts\Repositories\CartRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\ProductVariantRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Cart\StoreCartRequest;
use App\Http\Resources\CartResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StoreCart extends Controller
{
    public function __invoke(
        StoreCartRequest                  $request,
        CartRepositoryInterface           $cartRepository,
        CartItemRepositoryInterface       $cartItemRepository,
        ProductVariantRepositoryInterface $productVariantRepository,
        ProductRepositoryInterface        $productRepository,
    ): JsonResponse
    {
        DB::transaction(function ()
        use (
            $cartRepository,
            $cartItemRepository,
            $request,
            $productVariantRepository,
            $productRepository,
        ) {

            $totalPrice = 0;
            $cart = $cartRepository->create([
                'user_id' => auth()->id(),
                'total_price' => $totalPrice,
            ]);

            $productVariant = $productVariantRepository->find($request->product_variant_id);
            if ($productVariant) {
                $price = $productVariant->price;
            } else {
                $product = $productRepository->find($request->product_id);
                $price = $product->price;
            }
            $totalPrice += $price * $request->quantity;

            $cartItemRepository->create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'product_variant_id' => $request->product_variant_id,
                'quantity' => $request->quantity,
                'price' => $price,
            ]);

            $cartRepository->update([
                'total_price' => $totalPrice
            ], $cart->id);

        });

        return ApiResponse::success(
            CartResource::collection(
                $cartRepository
                    ->with(['user', 'items'])
                    ->index()
            )
        );
    }
}
