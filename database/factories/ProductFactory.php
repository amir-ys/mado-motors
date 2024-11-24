<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_fa' => $this->faker->word,
            'title_en' => $this->faker->word,
            'category_id' => ProductCategory::factory(),
            'creator_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'spod_id' => $this->faker->optional()->uuid,
            'original_price' => $this->faker->randomNumber(5, true),
            'payable_price' => $this->faker->randomNumber(5, true),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
