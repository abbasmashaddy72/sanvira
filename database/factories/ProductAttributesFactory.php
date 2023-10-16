<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAttributes>
 */
class ProductAttributesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Product::pluck('id')[$this->faker->numberBetween(1, Product::count() - 1)],
            'name' => $this->faker->name(),
            'value' => $this->faker->title(),
        ];
    }
}
