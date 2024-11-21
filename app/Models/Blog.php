<?php

namespace App\Models;

use App\Scopes\OrderByIdScope;
use App\Services\Media\HasMediaTrait;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;

class Blog extends Model implements HasMedia
{
    use HasMediaTrait, BasicModel, SearchableTrait, SoftDeletes;

    protected $fillable = ['title', 'category_id', 'summary', 'description', 'creator_id', 'is_active'];

    protected array $searchable = ['category:name', 'title', 'summary', 'is_active'];

    public array $mapSearchFields = [
        'category_name' => 'category:name'
    ];

    public static function getTableName(): string
    {
        return "blogs";
    }

    public static function boot()
    {
        parent::boot();

        if (!app()->runningInConsole()) {
            static::addGlobalScope(new OrderByIdScope);
        }
        static::creating(function ($model) {
            $model->creator_id = auth()->id();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')
            ->useFallbackUrl(config('media-library.wm-cdn') . '/static-images/placeholder/article-placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder/article-placeholder.jpg'))
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
