<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'city_id', 'address', 'postal_code', 'latitude', 'longitude',
    ];

    protected $with = ['user', 'city'];

    public static function getTableName(): string
    {
        return 'user_addresses';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
