<?php

namespace App\Models;

use App\Enums\ReviewPointTypeEnum;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewPoint extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id', 'type', 'text',
    ];

    protected array $searchable = [];

    protected $casts = [
        'type' => ReviewPointTypeEnum::class
    ];

    public static function getTableName(): string
    {
        return 'review_points';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
