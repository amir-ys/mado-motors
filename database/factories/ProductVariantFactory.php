<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<ProductVariant>
 */
class ProductVariantFactory extends Factory
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
            'original_price' => $this->faker->numberBetween(1000, 99999),
            'price' => $this->faker->numberBetween(1000, 99999),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($productVariant) {
            // Insert pivot table data
            $attributeValues = AttributeValue::query()->inRandomOrder()
                ->take(2)
                ->pluck('id');

            foreach ($attributeValues as $attributeValueId) {
                DB::table('product_variant_attributes')->insert([
                    'product_variant_id' => $productVariant->id,
                    'attribute_value_id' => $attributeValueId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
