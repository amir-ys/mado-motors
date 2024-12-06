<?php

namespace App\Repositories;

use App\Contracts\Repositories\AttributeValueRepositoryInterface;
use App\Models\AttributeValue;

class AttributeValueRepository extends BaseRepository implements AttributeValueRepositoryInterface
{
    public function model(): string
    {
        return AttributeValue::class;
    }
}
