<?php

namespace App\Http\Controllers\User\ProductReview;

use App\Contracts\ProductReviewRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductReviewResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexProductReview extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::created(
            ProductReviewResource::collection(
                app(ProductReviewRepositoryInterface::class)->getByUserId(
                    auth()->id()
                )
            )
        );
    }
}
