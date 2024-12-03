<?php

namespace App\Contracts\Services;

use App\Enums\SettingKeyEnum;

interface SettingServiceInterface
{
    public function get(SettingKeyEnum $key);
}
