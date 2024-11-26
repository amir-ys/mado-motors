<?php

namespace App\Repositories;

use App\Contracts\ReviewPointRepositoryInterface;
use App\Models\ReviewPoint;

class ReviewPointRepository extends BaseRepository implements ReviewPointRepositoryInterface
{
    public function model(): string
    {
        return ReviewPoint::class;
    }
}
