<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function model(): string
    {
        return Order::class;
    }

    public function orderDetails(int $id)
    {
        return $this->with(
            ['user', 'address', 'items', 'items.product', 'items.productVariant']
        )->findOrFail($id);
    }
}
