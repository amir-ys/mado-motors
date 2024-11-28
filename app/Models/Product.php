<?php

namespace App\Models;

use App\Services\Media\HasMediaTrait;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use BasicModel, HasMediaTrait, SearchableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fa', 'title_en', 'category_id', 'creator_id',
        'description', 'spod_id', 'original_price',
        'payable_price', 'quantity',
    ];

    #todo fill searchable
    protected array $searchable = [];

    public static function getTableName(): string
    {
        return 'products';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function relatedProducts(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'related_products',
            'product_id',
            'related_product_id',
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')
            ->useFallbackUrl(config('media-library.wm-cdn') . '/static-images/placeholder/product-placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder/product-placeholder.jpg'))
            ->singleFile();
    }

    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $crop = $media->getCustomProperty('crop');
        $conversion = $this->addMediaConversion('thumbnail');
        $conversion = !$crop ? $conversion : $conversion->manualCrop($crop['width'], $crop['height'], $crop['left'], $crop['top']);
        $conversion->nonQueued()
            ->performOnCollections('main_image');

        $this->addMediaConversion('thumbnail')
            ->width(400)
            ->nonQueued()
            ->performOnCollections('images');
    }

    protected static function getValidCollections(): array
    {
        return [
            'main_image',
            'images'
        ];
    }
}
