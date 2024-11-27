<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserAddress>
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
            'user_id' => User::factory(),
            'city_id' => City::factory(),
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'latitude' => 0,
            'longitude' => 0,
        ];
    }
}
