<?php

namespace App\Contracts\Repositories;

interface UserAddressRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($userId);

    public function destroyByIdAndUserId($id, $userId);
}
