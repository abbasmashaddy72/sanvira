<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductView>
 */
class ProductViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')[fake()->numberBetween(1, User::count() - 1)],
            'product_id' => Product::pluck('id')[fake()->numberBetween(1, Product::count() - 1)],
            'clicks' => rand(1, 40),
        ];
    }
}
