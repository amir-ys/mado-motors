<?php

namespace App\Contracts;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function orderDetails(int $id);
}
