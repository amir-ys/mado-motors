<?php

namespace App\Http\Controllers\Admin\ReviewPoint;

use App\Contracts\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewPoint\UpdateOrderRequest;
use App\Http\Resources\ReviewPointResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateReviewPoint extends Controller
{
    public function __invoke($id, UpdateOrderRequest $updateReviewPointRequest): JsonResponse
    {
        return ApiResponse::success(
            ReviewPointResource::make(
                app(ReviewPointRepositoryInterface::class)->update(
                    $updateReviewPointRequest->validated(),
                    $id
                )
            )
        );
    }
}
