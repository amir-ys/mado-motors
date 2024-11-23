<?php

namespace App\Models;

use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use  BasicModel, SearchableTrait, HasFactory;

    protected $fillable = ['name'];

    protected array $searchable = ['name'];

    public static function getTableName(): string
    {
        return 'attributes';
    }

}
