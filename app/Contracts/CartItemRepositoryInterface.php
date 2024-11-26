<?php

namespace App\Contracts;

interface CartItemRepositoryInterface extends BaseRepositoryInterface
{
    public function getByCartId($cartId);
}
