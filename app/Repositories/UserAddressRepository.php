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

    public function getByUserId($userId)
    {
        return $this->scopeQuery(function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        })
            ->paginate();
    }
}
