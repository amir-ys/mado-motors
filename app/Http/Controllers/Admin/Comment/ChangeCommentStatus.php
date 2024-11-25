<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Contracts\CommentRepositoryInterface;
use App\Enums\CommentStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\ChangeCommentStatusRequest;
use App\Http\Resources\CommentResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ChangeCommentStatus extends Controller
{
    public function __invoke($id, ChangeCommentStatusRequest $request): JsonResponse
    {
        return ApiResponse::success(
            CommentResource::make(
                app(CommentRepositoryInterface::class)->changeStatus(
                    $id,
                    CommentStatusEnum::from($request->status),
                )
            )
        );
    }
}
