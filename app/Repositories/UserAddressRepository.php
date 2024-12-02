<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Models\UserAddress;

class UserAddressRepository extends BaseRepository implements UserAddressRepositoryInterface
{
    public function model(): string
    {
        return UserAddress::class;
    }
}
