<?php

namespace App\Models;

use App\Services\Media\HasMediaTrait;
use App\Services\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use  HasMediaTrait, BasicModel, SearchableTrait;

    protected $fillable = ['name'];

    protected array $searchable = ['name'];

    public static function getTableName(): string
    {
        return 'attributes';
    }

}
