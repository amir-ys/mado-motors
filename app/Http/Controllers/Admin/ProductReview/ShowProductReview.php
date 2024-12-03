<?php

namespace App\Http\Controllers\Admin\ProductReview;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductReviewResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowProductReview extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            ProductReviewResource::make(
                app(ProductReviewRepositoryInterface::class)
                    ->with(['product', 'user', 'points'])
                    ->find($id)
            )
        );
    }
}
