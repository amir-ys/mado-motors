<?php

namespace App\Contracts;

use App\Enums\CommentStatusEnum;

interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id, CommentStatusEnum $statusEnum);
}
