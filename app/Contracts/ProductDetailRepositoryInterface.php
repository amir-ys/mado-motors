<?php

namespace App\Contracts;

interface ProductDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function checkExists($data): bool;

    public function store(array $attributes);

    public function getByAgentId($agentId);

    public function TransferOwner(array $data);
}
