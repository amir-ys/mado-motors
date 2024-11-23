<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    use BasicModel, SearchableTrait, HasFactory;

    protected $table = 'attribute_values';
    protected $fillable = ['attribute_id', 'value'];

    protected array $searchable = ['value'];

    public static function getTableName(): string
    {
        return 'attribute_values';
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
