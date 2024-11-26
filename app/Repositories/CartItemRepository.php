<?php

namespace App\Repositories;

use App\Contracts\CartItemRepositoryInterface;
use App\Models\CartItem;

class CartItemRepository extends BaseRepository implements CartItemRepositoryInterface
{
    public function model(): string
    {
        return CartItem::class;
    }

    public function getByCartId($cartId)
    {
        return $this
            ->where(['cart_id' => $cartId])
            ->filtered()
            ->with(['product', 'productVariant', 'cart'])
            ->paginate();
    }
}
