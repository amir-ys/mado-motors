<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductReviewPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review_id' => $this->faker->randomDigitNotNull,
            'type' => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->paragraph,
        ];
    }
}
