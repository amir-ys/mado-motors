<?php

namespace App\Http\Controllers\Admin\ReviewPoint;

use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyReviewPoint extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(ReviewPointRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'review points deleted successfully'
        );
    }
}
