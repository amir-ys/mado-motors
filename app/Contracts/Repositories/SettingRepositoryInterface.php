<?php

namespace App\Contracts\Repositories;

use App\Enums\SettingKeyEnum;

interface SettingRepositoryInterface extends BaseRepositoryInterface
{
    public function findByKey(SettingKeyEnum $keyEnum);
}
