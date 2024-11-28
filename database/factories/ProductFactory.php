<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Product>
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

    public function configure()
    {
        return $this->afterCreating(function ($product) {
            $products = Product::query()->inRandomOrder()
                ->take(2)
                ->pluck('id');

            foreach ($products as $productId) {
                DB::table('related_products')->insert([
                    'product_id' => $product->id,
                    'related_product_id' => $productId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
