<?php

namespace App\Repositories;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Enums\CommentStatusEnum;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function model(): string
    {
        return Comment::class;
    }

    public function changeStatus($id, CommentStatusEnum $statusEnum)
    {
        $comment = $this->find($id);

        if ($comment->status !== $statusEnum) {
            $comment->update([
                'status' => $statusEnum
            ]);
        }
        $comment->load(['user', 'parent']);

        return $comment;
    }
}
