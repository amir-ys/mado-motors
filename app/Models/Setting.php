<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use  BasicModel, SearchableTrait, HasFactory;

    protected array $searchable = [];

    protected $fillable = [];

    public static function getTableName(): string
    {
        return 'settings';
    }
}
