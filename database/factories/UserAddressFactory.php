<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
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
            'city_id' => $this->faker->randomDigitNotNull,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'latitude' => 0,
            'longitude' => 0,
        ];
    }
}
