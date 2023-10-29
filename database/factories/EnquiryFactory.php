<?php

namespace Database\Factories;

use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Rfq;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enquiry>
 */
class EnquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rfq_id' => fake()->randomElement(Rfq::pluck('id')->toArray()),
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'submission_time' => fake()->time(),
            'status' => fake()->randomElement(explode(',', Enquiry::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Enquiry $enquiry) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            // $quantities = [];
            // foreach ($productIds as $productId) {
            //     $quantities[$productId] = ['quantity' => rand(10, 500)];
            // }

            // Attach products to the RFQ
            $enquiry->products()->attach($productIds);
        });
    }
}
