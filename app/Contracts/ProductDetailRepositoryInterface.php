<?php

namespace App\Contracts;

interface ProductDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function checkExists($data): bool;

    public function store(array $attributes);
}
