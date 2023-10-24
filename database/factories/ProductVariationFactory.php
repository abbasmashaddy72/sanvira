<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
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
            'min_price' => rand(50, 250),
            'max_price' => rand(500, 50000),
            'min_order_quantity' => rand(10, 50),
            'max_order_quantity' => rand(100, 250),
        ];
    }
}
