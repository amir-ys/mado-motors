<?php

namespace Database\Factories;

use App\Models\ReviewPoint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReviewPoint>
 */
class ReviewPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->optional()->randomDigitNotNull,
            'type' => $this->faker->numberBetween(0, 1),
            'text' => $this->faker->paragraph,
        ];
    }
}
