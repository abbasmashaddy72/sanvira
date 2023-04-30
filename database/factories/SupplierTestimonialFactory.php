<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierTestimonial>
 */
class SupplierTestimonialFactory extends Factory
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
            'logo' => "supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg",
            'message' => $this->faker->realText(),
            'year' => rand(1994, 2020),
            'rating' => rand(1, 5),
        ];
    }
}
