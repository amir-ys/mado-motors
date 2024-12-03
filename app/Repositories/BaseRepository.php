<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository as L5Repository;

abstract class BaseRepository extends L5Repository implements BaseRepositoryInterface
{
    public function index()
    {
        return $this->filtered()->paginate();
    }
}
