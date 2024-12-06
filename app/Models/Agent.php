<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'user_id',
        'address_id',
        'description',
    ];

    public static function getTableName(): string
    {
        return 'agents';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(UserAddress::class);
    }

    public static function generateUniqueCode()
    {
        $code = random_int(100, 999);
        if (self::query()->where('code', $code)->exists()) {
            self::generateUniqueCode();
        }

        return $code;
    }
}
