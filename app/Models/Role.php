<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use  BasicModel, HasFactory;

    public static function getTableName(): string
    {
        return 'roles';
    }
}
