<?php

namespace App\Services;

use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\SettingServiceInterface;
use App\Enums\SettingKeyEnum;

class SettingService implements SettingServiceInterface
{
    public function get(SettingKeyEnum $key)
    {
        return resolve(SettingRepositoryInterface::class)
            ->findByKey($key);
    }
}
