<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use  BasicModel, SearchableTrait, HasFactory, SoftDeletes;

    protected array $searchable = [];

    protected $fillable = [
        'order_id', 'owner_id', 'agent_id', 'chassis_number',
        'engine_number', 'plaque_number', 'year_of_production',
        'product_id'
    ];

    public static function getTableName(): string
    {
        return 'product_details';
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function owners()
    {
        return $this->belongsToMany(User::class, 'product_detail_owner')
            ->withPivot('transfer_date')
            ->withTimestamps();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
