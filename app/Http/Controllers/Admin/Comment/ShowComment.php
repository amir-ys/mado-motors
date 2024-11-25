<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Contracts\CommentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowComment extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            CommentResource::make(
                app(CommentRepositoryInterface::class)
                    ->with(['parent', 'user'])
                    ->find($id)
            )
        );
    }
}
