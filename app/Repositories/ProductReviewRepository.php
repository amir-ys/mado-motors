<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductReviewRepositoryInterface;
use App\Enums\ProductReviewStatusEnum;
use App\Enums\ReviewPointTypeEnum;
use App\Models\ProductReview;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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

    public function update(array $attributes, $id): mixed
    {
        $productReview = null;
        DB::transaction(function () use (&$productReview, $attributes, $id) {
            $data = Arr::except($attributes, 'review_points_ids');
            $data['status'] = ProductReviewStatusEnum::PENDING;
            $productReview = ProductReview::query()
                ->where('id', $id)
                ->first();

            $productReview->update($data);
            $productReview->points()->sync([]);
            $productReview->points()->attach(array_values($attributes['review_points_ids']));

            $productReview->load([
                'product',
                'user',
                'points',
            ]);

        });

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

    public function deleteByIdAndUserId($id, $userId): ?bool
    {
        $result = ProductReview::query()
            ->where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        return $result->delete();
    }
}
