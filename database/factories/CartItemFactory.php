<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => $this->faker->randomDigitNotNull,
            'product_id' => Product::factory(),
            'product_variant_id' => null,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomNumber(4, true),
        ];
    }
}
