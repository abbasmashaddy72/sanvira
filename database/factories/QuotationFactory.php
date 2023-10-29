<?php

namespace Database\Factories;

use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quotation>
 */
class QuotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enquiry_id' => fake()->randomElement(Enquiry::pluck('id')->toArray()),
            'status' => fake()->randomElement(explode(',', Quotation::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Quotation $quotation) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            // $quantities = [];
            // foreach ($productIds as $productId) {
            //     $quantities[$productId] = ['quantity' => rand(10, 500)];
            // }

            // Attach products to the RFQ
            $quotation->products()->attach($productIds);
        });
    }
}
