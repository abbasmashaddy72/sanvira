<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\DeliveryNote;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryNote>
 */
class DeliveryNoteFactory extends Factory
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
            'delivery_notes_attachment' => null,
            'status' => fake()->randomElement(explode(',', DeliveryNote::$enumCasts['status'])),
        ];
    }

    /**
     * Attach products to the RFQ.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DeliveryNote $deliveryNote) {
            // Generate an array of random product IDs
            $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

            // Create an array of quantities for each product
            // $quantities = [];
            // foreach ($productIds as $productId) {
            //     $quantities[$productId] = ['quantity' => rand(10, 500)];
            // }

            $deliveryNote->products()->attach($productIds);
        });
    }
}
