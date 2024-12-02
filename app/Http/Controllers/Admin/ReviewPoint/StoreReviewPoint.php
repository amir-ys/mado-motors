<?php

namespace App\Http\Controllers\Admin\ReviewPoint;

use App\Contracts\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewPoint\StoreReviewPointRequest;
use App\Http\Resources\ReviewPointResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreReviewPoint extends Controller
{
    public function __invoke(StoreReviewPointRequest $createReviewPointRequest): JsonResponse
    {
        return ApiResponse::created(
            ReviewPointResource::make(
                app(ReviewPointRepositoryInterface::class)->create(
                    $createReviewPointRequest->validated()
                )
            )
        );
    }
}
