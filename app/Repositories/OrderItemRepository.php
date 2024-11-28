<?php

namespace App\Repositories;

use App\Contracts\OrderItemRepositoryInterface;
use App\Models\OrderItem;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    public function model(): string
    {
        return OrderItem::class;
    }
}
