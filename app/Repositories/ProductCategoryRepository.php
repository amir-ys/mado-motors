<?php

namespace App\Repositories;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    public function model(): string
    {
        return ProductCategory::class;
    }

    public function index()
    {
        return $this->filtered()->paginate();
    }
}
