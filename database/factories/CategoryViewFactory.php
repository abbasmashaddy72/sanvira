<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryView>
 */
class CategoryViewFactory extends Factory
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
            'category_id' => Category::pluck('id')[fake()->numberBetween(1, Category::count() - 1)],
            'clicks' => rand(1, 40),
        ];
    }
}
