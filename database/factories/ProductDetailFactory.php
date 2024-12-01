<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
            'order_id' => Order::factory(),
            'owner_id' => User::factory(),
            'agent_id' => Agent::factory(),
            'product_id' => Product::factory(),
            'chassis_number' => $this->faker->word,
            'engine_number' => $this->faker->word,
            'plaque_number' => $this->faker->optional()->word,
            'year_of_production' => now()->format('Y-m-d'),
        ];
    }
}
