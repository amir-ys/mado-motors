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

    public function getByUserId($userId)
    {
        return $this->scopeQuery(function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        })
            ->paginate();
    }
}
