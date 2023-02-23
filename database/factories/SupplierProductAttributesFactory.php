<?php

namespace Database\Factories;

use App\Models\SupplierProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierProductAttributes>
 */
class SupplierProductAttributesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplier_product_id' => SupplierProduct::pluck('id')[$this->faker->numberBetween(1, SupplierProduct::count() - 1)],
            'name' => $this->faker->name(),
            'value' => $this->faker->title(),
        ];
    }
}
