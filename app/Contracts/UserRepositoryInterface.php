<?php

namespace App\Contracts;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findByMobile($mobile);
}
