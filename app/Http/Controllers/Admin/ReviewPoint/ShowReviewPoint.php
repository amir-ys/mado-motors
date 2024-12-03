<?php

namespace App\Http\Controllers\Admin\ReviewPoint;

use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewPointResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowReviewPoint extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            ReviewPointResource::make(
                app(ReviewPointRepositoryInterface::class)
                    ->find($id)
            )
        );
    }
}
