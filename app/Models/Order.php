<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected array $searchable = [];

    protected $fillable = [
        'user_id', 'total_price', 'status', 'address_id',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class
    ];

    public static function getTableName(): string
    {
        return 'orders';
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
