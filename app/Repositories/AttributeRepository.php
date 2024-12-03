<?php

namespace App\Repositories;

use App\Contracts\Repositories\AttributeRepositoryInterface;
use App\Models\Attribute;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    public function model(): string
    {
        return Attribute::class;
    }
}
