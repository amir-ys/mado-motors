<?php

namespace App\Http\Controllers\User\ProductReview;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Contracts\Repositories\ReviewPointRepositoryInterface;
use App\Enums\ReviewPointTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ReviewPoint\StoreProductReviewRequest;
use App\Http\Resources\ProductReviewResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreProductReview extends Controller
{
    public function __construct(protected ReviewPointRepositoryInterface $reviewPointRepository)
    {

    }

    public function __invoke(StoreProductReviewRequest $productReviewRequest): JsonResponse
    {
        $data = $productReviewRequest->validated();
        if (Arr::exists($data, 'review_points_texts')) {
            DB::transaction(function () use (&$data) {
                foreach ($data['review_points_texts'] as $review_points_text) {
                    $insertData = [
                        'product_id' => $data['product_id'],
                        'text' => $review_points_text['text'],
                        'type' => ReviewPointTypeEnum::from($review_points_text['type']),
                    ];
                    $data['review_points_ids'][] = $this->reviewPointRepository->create($insertData)?->id;
                }
                $data = Arr::except($data, 'review_points_texts');
            });
        }

        $data['user_id'] = auth()->id();
        return ApiResponse::created(
            ProductReviewResource::make(
                app(ProductReviewRepositoryInterface::class)->store(
                    $data
                )
            )
        );
    }
}
