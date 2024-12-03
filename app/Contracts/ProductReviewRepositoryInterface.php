<?php

namespace App\Contracts;

interface ProductReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($userId);
}
