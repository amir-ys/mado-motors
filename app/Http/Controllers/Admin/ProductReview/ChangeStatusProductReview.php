<?php

namespace App\Http\Controllers\Admin\ProductReview;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Enums\ProductReviewStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductReview\ChangeProductReviewStatusRequest;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class
ChangeStatusProductReview extends Controller
{
    public function __invoke($id, ChangeProductReviewStatusRequest $request): JsonResponse
    {
        return ApiResponse::success(
            data: app(ProductReviewRepositoryInterface::class)->changeStatus(
                $id,
                ProductReviewStatusEnum::from($request->status),
            ),
            message: 'product review status changed successfully'
        );
    }
}
