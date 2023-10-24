<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillingAddress>
 */
class BillingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')[$this->faker->numberBetween(1, User::count() - 1)],
            'city_id' => City::pluck('id')[$this->faker->numberBetween(1, City::count() - 1)],
            'company_name' => fake()->company(),
            'street_no' => fake()->streetAddress(),
            'locality' => fake()->lastName(),
            'landmark' => fake()->address(),
            'zip_code' => rand(1000, 900000),
        ];
    }
}
