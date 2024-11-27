<?php

namespace Database\Factories;

use App\Enums\ProductReviewStatusEnum;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ReviewPoint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(ProductReviewStatusEnum::cases()),
            'text' => $this->faker->word,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($productReview) {
            $points = ReviewPoint::query()->inRandomOrder()
                ->take(2)
                ->pluck('id');

            foreach ($points as $pointId) {
                DB::table('product_review_point')->insert([
                    'product_review_id' => $productReview->id,
                    'point_id' => $pointId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
