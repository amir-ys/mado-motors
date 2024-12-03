<?php

namespace App\Repositories;

use App\Contracts\Repositories\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function model(): string
    {
        return Cart::class;
    }
}
