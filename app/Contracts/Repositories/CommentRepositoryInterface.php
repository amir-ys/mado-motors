<?php

namespace App\Contracts\Repositories;

use App\Enums\CommentStatusEnum;

interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id, CommentStatusEnum $statusEnum);
}
