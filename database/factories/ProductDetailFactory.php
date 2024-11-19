<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->optional()->randomDigitNotNull,
            'payment_id' => $this->faker->optional()->randomDigitNotNull,
            'owner_id' => $this->faker->optional()->randomDigitNotNull,
            'agent_id' => $this->faker->optional()->randomDigitNotNull,
            'chassis_number' => $this->faker->word,
            'engine_number' => $this->faker->word,
            'plaque number' => $this->faker->optional()->word,
            'year_of_production' => $this->faker->year,
        ];
    }
}
