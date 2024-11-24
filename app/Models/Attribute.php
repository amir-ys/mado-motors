<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use  BasicModel, SearchableTrait, HasFactory;

    protected $fillable = ['name'];

    protected array $searchable = ['name'];

    public static function getTableName(): string
    {
        return 'attributes';
    }

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
