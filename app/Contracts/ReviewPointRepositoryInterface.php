<?php

namespace App\Contracts;

interface ReviewPointRepositoryInterface extends BaseRepositoryInterface
{
    public function getDefault();
}
