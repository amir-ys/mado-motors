<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected array $searchable = [];

    protected $fillable = [
        'user_id', 'order_id', 'method', 'status', 'driver', 'price', 'paid_at',
        'transaction_id', 'ref_id',
    ];

    public static function getTableName(): string
    {
        return 'payments';
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
