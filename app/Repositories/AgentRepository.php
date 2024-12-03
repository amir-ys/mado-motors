<?php

namespace App\Repositories;

use App\Contracts\Repositories\AgentRepositoryInterface;
use App\Models\Agent;

class AgentRepository extends BaseRepository implements AgentRepositoryInterface
{
    public function model(): string
    {
        return Agent::class;
    }

    public function findByUserId($id)
    {
        return $this->findWhere([
            'user_id' => $id
        ])->first();
    }
}
