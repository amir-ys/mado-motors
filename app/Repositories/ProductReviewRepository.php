<?php

namespace App\Repositories;

use App\Contracts\ProductReviewRepositoryInterface;
use App\Enums\ProductReviewStatusEnum;
use App\Enums\ReviewPointTypeEnum;
use App\Models\ProductReview;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductReviewRepository extends BaseRepository implements ProductReviewRepositoryInterface
{
    public function model(): string
    {
        return ProductReview::class;
    }

    /**
     * @throws ValidatorException
     */
    public function store(array $attributes)
    {
        $data = Arr::except($attributes, 'review_points_ids');
        $data['status'] = ProductReviewStatusEnum::PENDING;
        $productReview = $this->create($data);
        $productReview->points()->attach(array_values($attributes['review_points_ids']));

        $productReview->load([
            'product',
            'user',
            'points',
        ]);

        return $productReview;
    }

    public function getByUserId($userId): LengthAwarePaginator
    {
        return ProductReview::query()
            ->where('user_id', $userId)
            ->withCount([
                'points as negative_points_count' => function ($query) {
                    $query->where('type', ReviewPointTypeEnum::NEGATIVE->value);
                },
                'points as positive_points_count' => function ($query) {
                    $query->where('type', ReviewPointTypeEnum::POSITIVE->value);
                }
            ])
            ->paginate();
    }
}
