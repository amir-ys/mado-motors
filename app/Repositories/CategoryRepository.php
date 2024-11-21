<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\ProductCategory;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model(): string
    {
        return ProductCategory::class;
    }
}
