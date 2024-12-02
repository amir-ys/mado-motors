<?php

namespace App\Http\Controllers\User\ProductReview;

use App\Contracts\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewPointResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexDefaultReviewPoint extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::created(
            ReviewPointResource::collection(
                app(ReviewPointRepositoryInterface::class)->getDefault()
            )
        );
    }
}
