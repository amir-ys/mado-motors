<?php

namespace App\Contracts\Repositories;

interface ProductReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($userId);

    public function deleteByIdAndUserId($id, $userId);
}
