<?php

namespace App\Repositories;

use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Enums\SettingKeyEnum;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    public function model(): string
    {
        return Setting::class;
    }

    public function findByKey(SettingKeyEnum $keyEnum)
    {
        return Setting::query()->where('key', $keyEnum->value)->first();
    }
}
