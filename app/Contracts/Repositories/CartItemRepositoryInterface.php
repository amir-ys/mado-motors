<?php

namespace App\Contracts\Repositories;

interface CartItemRepositoryInterface extends BaseRepositoryInterface
{
    public function getByCartId($cartId);
}
