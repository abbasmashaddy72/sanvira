<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierCertificate>
 */
class SupplierCertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['Award', 'Certificate'];

        return [
            'supplier_id' => Supplier::pluck('id')[$this->faker->numberBetween(1, Supplier::count() - 1)],
            'title' => $this->faker->title(),
            'attachment' => "supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg",
            'type' => $types[array_rand($types)]
        ];
    }
}
