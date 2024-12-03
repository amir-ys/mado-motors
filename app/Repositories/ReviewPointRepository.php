<?php

namespace App\Repositories;

use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Models\ReviewPoint;

class ReviewPointRepository extends BaseRepository implements ReviewPointRepositoryInterface
{
    public function model(): string
    {
        return ReviewPoint::class;
    }

    public function getDefault()
    {
        return $this->scopeQuery(function ($q) {
            return $q->whereNull('product_id');
        })
            ->filtered()
            ->paginate();
    }
}
