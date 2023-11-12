<?php

namespace Database\Factories;

use App\Models\DeliveryNote;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductVariation;
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
        $now = Carbon::now();
        return [
            'delivery_note_id' => fake()->randomElement(DeliveryNote::pluck('id')->toArray()),
            'buyer_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'staff_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'invoice_no' => 'INV-' . $now->year . $now->month . '-000' . fake()->unique()->numberBetween(0001, 10000),
            'delivery_note_submission_date_time' => fake()->dateTime(),
            'status' => fake()->randomElement(explode(',', Invoice::$enumCasts['status'])),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Invoice $invoice) {
            $this->attachProducts($invoice);
        });
    }

    protected function attachProducts(Invoice $invoice)
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
        $invoice->products()->attach($pivotData);
    }
}
