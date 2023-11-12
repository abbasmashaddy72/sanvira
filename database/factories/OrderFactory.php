<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\ProductVariation;
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
        $now = Carbon::now();
        return [
            'quotation_id' => fake()->randomElement(Quotation::pluck('id')->toArray()),
            'buyer_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'staff_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'order_no' => 'ORD-' . $now->year . $now->month . '-000' . fake()->unique()->numberBetween(0001, 10000),
            'quotation_submission_date_time' => fake()->dateTime(),
            'status' => fake()->randomElement(explode(',', Order::$enumCasts['status'])),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $this->attachProducts($order);
        });
    }

    protected function attachProducts(Order $order)
    {
        // ... your logic to attach products here
        $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

        // Create an array of quantities for each product
        $pivotData = [];
        foreach ($productIds as $productId) {
            $pivotData[$productId] = [
                'brand_id' => fake()->randomElement(ProductVariation::where('product_id', $productId)->pluck('brand_id')->toArray()),
                'size' => rand(100, 500) . ' x ' . rand(100, 500) . ' x ' . rand(100, 500) . ' ' . fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']),
                'weight' => rand(10, 500) . ' ' . fake()->randomElement([null, 'Kg', 'N/mm2', 'Kg/m3', 'ltrs', 'tons', 'pounds']),
                'diameter' => rand(100, 500) . fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']),
                'quantity_type' => fake()->randomElement(['Bags', 'Cartoon', 'Pieces', 'Tons', 'Rolls', 'Cubic Meter', 'Each', 'Square Meter', 'Linear Meter', 'Jerry Can', rand(1, 50) . ' Pieces / Cartoon', 'Drum']),
                'color' => fake()->colorName(),
                'item_type' => fake()->randomElement([null, 'Q-1', 'Q-2', 'Q-3', 'Q-4']),
                'quantity' => rand(10, 5000),
                'our_price' => rand(1000, 900000),
                'client_price' => rand(1000, 50000),
            ];
        }

        // Attach products to the RFQ with the specified quantities
        $order->products()->attach($pivotData);
    }
}
