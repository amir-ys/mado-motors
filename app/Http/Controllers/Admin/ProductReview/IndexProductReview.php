<?php

namespace App\Http\Controllers\Admin\ProductReview;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductReviewResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexProductReview extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            ProductReviewResource::collection(
                app(ProductReviewRepositoryInterface::class)
                    ->with(['product', 'user', 'points'])
                    ->index()
            )
        );
    }
}
