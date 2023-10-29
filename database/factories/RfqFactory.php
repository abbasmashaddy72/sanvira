<?php

namespace Database\Factories;

use App\Models\Rfq;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class RfqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::whereHas('roles', function ($query) {
                $query->where('name', 'Buyer');
            })->pluck('id')->toArray()),
            'status' => fake()->randomElement(explode(',', Rfq::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Rfq $rfq) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            $pivotData = [];
            foreach ($productIds as $productId) {
                $pivotData[$productId] = ['quantity' => rand(10, 500)];
            }

            // Attach products to the RFQ with the specified quantities
            $rfq->products()->attach($pivotData);
        });
    }
}
