<?php

namespace App\Contracts\Repositories;

interface ProductDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function checkExists($data): bool;

    public function store(array $attributes);

    public function getByAgentId($agentId);

    public function getByUserId($userId);

    public function TransferOwner(array $data);
}
