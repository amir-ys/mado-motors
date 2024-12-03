<?php

namespace App\Contracts\Repositories;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findByMobile($mobile);

    public function updateProfile(array $attributes, $id);
}
