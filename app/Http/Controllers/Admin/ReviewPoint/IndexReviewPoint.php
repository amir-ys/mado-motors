<?php

namespace App\Http\Controllers\Admin\ReviewPoint;

use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewPointResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexReviewPoint extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            ReviewPointResource::collection(
                app(ReviewPointRepositoryInterface::class)->index()
            )
        );
    }
}
