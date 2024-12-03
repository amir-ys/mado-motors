<?php

namespace App\Contracts\Repositories;

interface CartRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($userId);
}
