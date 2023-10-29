<?php

namespace Database\Factories;

use App\Models\Rfq;
use App\Models\Order;
use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quotation_id' => fake()->randomElement(Quotation::pluck('id')->toArray()),
            'rfq_submission_date' => fake()->date(),
            'status' => fake()->randomElement(explode(',', Order::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            // $quantities = [];
            // foreach ($productIds as $productId) {
            //     $quantities[$productId] = ['quantity' => rand(10, 500)];
            // }

            $order->products()->attach($productIds);
        });
    }
}
