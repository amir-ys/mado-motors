<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use  BasicModel, SearchableTrait, HasFactory;

    protected $with = ['province'];

    public static function getTableName(): string
    {
        return 'cities';
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(City::class, 'parent_id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'parent_id');
    }
}
