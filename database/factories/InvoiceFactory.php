<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->randomElement(Order::pluck('id')->toArray()),
            'status' => fake()->randomElement(explode(',', Invoice::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Invoice $invoice) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            // $quantities = [];
            // foreach ($productIds as $productId) {
            //     $quantities[$productId] = ['quantity' => rand(10, 500)];
            // }

            // Attach products to the invoice
            $invoice->products()->attach($productIds);
        });
    }
}
