<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexComment extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            CommentResource::collection(
                app(CommentRepositoryInterface::class)
                    ->with(['user', 'parent'])
                    ->index()
            )
        );
    }
}
