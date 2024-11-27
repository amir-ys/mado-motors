<?php

namespace App\Http\Controllers\Admin\ProductReview;

use App\Contracts\ProductReviewRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyProductReview extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(ProductReviewRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'product review deleted successfully'
        );
    }
}
