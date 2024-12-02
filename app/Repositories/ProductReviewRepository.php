<?php

namespace App\Repositories;

use App\Contracts\ProductReviewRepositoryInterface;
use App\Enums\ProductReviewStatusEnum;
use App\Models\ProductReview;
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
}
