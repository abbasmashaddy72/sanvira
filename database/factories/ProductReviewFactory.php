<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->randomElement(Product::pluck('id')->toArray()),
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'rating' => rand(1, 5),
            'title' => fake()->title(),
            'comment' => fake()->realText(),
        ];
    }
}
