<?php

namespace App\Contracts\Repositories;

use App\Enums\ProductReviewStatusEnum;

interface ProductReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($userId);

    public function deleteByIdAndUserId($id, $userId);

    public function changeStatus($id, ProductReviewStatusEnum $reviewStatusEnum);
}
