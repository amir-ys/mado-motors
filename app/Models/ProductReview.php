<?php

namespace App\Models;

use App\Enums\ProductReviewStatusEnum;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected array $searchable = [];

    protected $fillable = [
        'product_id', 'user_id', 'text', 'status'
    ];

    protected $casts = [
        'status' => ProductReviewStatusEnum::class
    ];

    public static function getTableName(): string
    {
        return 'product_reviews';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function points()
    {
        return $this->belongsToMany(
            ReviewPoint::class,
            'product_review_point',
            'product_review_id',
            'point_id',
        )->withTimestamps();
    }
}
