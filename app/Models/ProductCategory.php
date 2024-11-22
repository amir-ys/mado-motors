<?php

namespace App\Models;

use App\Services\Media\HasMediaTrait;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use  HasMediaTrait, BasicModel, SearchableTrait, SoftDeletes;

    protected $fillable = ['title', 'parent_id'];

    protected array $searchable = ['title'];

    public static function getTableName(): string
    {
        return 'product_categories';
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}
