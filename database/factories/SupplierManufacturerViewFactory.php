<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierManufacturerView>
 */
class SupplierManufacturerViewFactory extends Factory
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
            'supplier_id' => Supplier::pluck('id')[$this->faker->numberBetween(1, Supplier::count() - 1)],
            'manufacturer_id' => Manufacturer::pluck('id')[$this->faker->numberBetween(1, Manufacturer::count() - 1)],
            'clicks' => rand(1, 40),
            'created_at' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'updated_at' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
        ];
    }
}
