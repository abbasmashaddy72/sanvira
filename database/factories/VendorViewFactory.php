<?php

namespace Database\Factories;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendorView>
 */
class VendorViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'vendor_id' => fake()->randomElement(Vendor::pluck('id')->toArray()),
            'clicks' => rand(1, 40),
        ];
    }
}
