<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'parent_id' => $this->faker->randomElement([
                Comment::query()->inRandomOrder()->first()->id,
                null
            ]),
            'body' => $this->faker->paragraph,
            'commentable_id' => $this->faker->randomDigitNotNull,
            'commentable_type' => $this->faker->randomElement(['product', 'review', 'order']),
            'status' => $this->faker->numberBetween(1, 3),
        ];

    }
}
