<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'original_price',
        'price',
        'quantity',
    ];
    protected array $searchable = [];

    public static function getTableName(): string
    {
        return 'product_variants';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'product_variant_attributes')
            ->withTimestamps();
    }
}
