<?php

namespace App\Facades;

use App\Enums\SettingKeyEnum;
use Illuminate\Support\Facades\Facade;

/**
 * @method static get(SettingKeyEnum $key)
 */
class SettingFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'setting';
    }

}
