<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'order_id' => $this->faker->randomDigitNotNull,
            'method' => $this->faker->numberBetween(1, 3),
            'status' => $this->faker->numberBetween(1, 3),
            'driver' => $this->faker->optional()->numberBetween(1, 5),
            'price' => $this->faker->randomNumber(5, true),
            'paid_at' => $this->faker->optional()->dateTimeThisYear,
            'transaction_id' => $this->faker->optional()->uuid,
            'ref_id' => $this->faker->optional()->uuid,
        ];
    }
}
