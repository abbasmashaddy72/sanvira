<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrandView>
 */
class BrandViewFactory extends Factory
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
            'brand_id' => Brand::pluck('id')[$this->faker->numberBetween(1, Brand::count() - 1)],
            'clicks' => rand(1, 40),
            'created_at' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'updated_at' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
        ];
    }
}