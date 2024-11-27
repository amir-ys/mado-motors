<?php

namespace App\Repositories;

use App\Contracts\ProductReviewRepositoryInterface;
use App\Models\ProductReview;

class ProductReviewRepository extends BaseRepository implements ProductReviewRepositoryInterface
{
    public function model(): string
    {
        return ProductReview::class;
    }
}
