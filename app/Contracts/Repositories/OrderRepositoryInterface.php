<?php

namespace App\Contracts\Repositories;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function orderDetails(int $id);
}
