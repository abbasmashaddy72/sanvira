<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\ProductVariation;
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
        $now = Carbon::now();
        return [
            'enquiry_id' => fake()->randomElement(Enquiry::pluck('id')->toArray()),
            'quotation_no' => 'QUO-' . $now->year . $now->month . '-000' . fake()->unique()->numberBetween(0001, 10000),
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
            $pivotData = [];
            foreach ($productIds as $productId) {
                $pivotData[$productId] = [
                    'quantity' => rand(10, 500),
                    'brand_id' => fake()->randomElement(ProductVariation::where('product_id', $productId)->pluck('brand_id')->toArray()),
                    'size' => rand(100, 500) . ' x ' . rand(100, 500) . ' x ' . rand(100, 500),
                    'diameter' => rand(100, 500),
                    'measurement_units' => fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']),
                    'weight' => rand(10, 500),
                    'weight_units' => fake()->randomElement([null, 'Kg', 'N/mm2', 'Kg/m3', 'ltrs', 'tons', 'pounds']),
                    'quantity_type' => fake()->randomElement(['Bags', 'Cartoon', 'Pieces', 'Tons', 'Rolls', 'Cubic Meter', 'Each', 'Square Meter', 'Linear Meter', 'Jerry Can', rand(1, 50) . ' Pieces / Cartoon', 'Drum']),
                    'color' => fake()->colorName(),
                    'item_type' => fake()->randomElement([null, 'Q-1', 'Q-2', 'Q-3', 'Q-4']),
                    'quantity' => rand(10, 5000),
                    'our_price' => rand(1000, 900000),
                    'client_price' => rand(1000, 50000),
                ];
            }

            // Attach products to the RFQ with the specified quantities
            $quotation->products()->attach($pivotData);
        });
    }
}
