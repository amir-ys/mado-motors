<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use  BasicModel, SearchableTrait, HasFactory;

    protected array $searchable = [];

    protected $fillable = [
        'user_id',
        'total_price'
    ];

    public static function getTableName(): string
    {
        return 'carts';
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
