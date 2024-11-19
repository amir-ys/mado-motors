<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'total_price' => $this->faker->randomNumber(5, true),
            'status' => $this->faker->numberBetween(1, 3),
            'address_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
