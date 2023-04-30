<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierProductCategory>
 */
class SupplierProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplier_id' => Supplier::pluck('id')[$this->faker->numberBetween(1, Supplier::count() - 1)],
            'name' => $this->faker->name(),
            'image' => "supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg",
            'parent_id' => rand(0, 12),
        ];
    }
}
