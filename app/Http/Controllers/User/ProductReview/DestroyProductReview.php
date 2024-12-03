<?php

namespace App\Http\Controllers\User\ProductReview;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyProductReview extends Controller
{
    public function __construct(protected ReviewPointRepositoryInterface $reviewPointRepository)
    {

    }

    public function __invoke($productReviewId): JsonResponse
    {
        app(ProductReviewRepositoryInterface::class)->deleteByIdAndUserId(
            $productReviewId,
            auth()->id(),
        );

        return ApiResponse::success(
            data: [],
            message: "product reviews deleted successfully"
        );
    }
}
