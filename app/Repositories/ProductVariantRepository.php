<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductVariantRepositoryInterface;
use App\Models\ProductVariant;

class
ProductVariantRepository extends BaseRepository implements ProductVariantRepositoryInterface
{
    public function model(): string
    {
        return ProductVariant::class;
    }
}
