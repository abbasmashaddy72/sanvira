<?php

namespace Database\Factories;

use App\Models\Rfq;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rfq>
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
        $now = Carbon::now();
        return [
            'user_id' => fake()->randomElement(User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })->pluck('id')->toArray()),
            'rfq_no' => 'RFQ-' . $now->year . $now->month . '-000' . fake()->unique()->numberBetween(0001, 10000),
            'status' => fake()->randomElement(explode(',', Rfq::$enumCasts['status'])),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Rfq $rfq) {
            $this->attachProducts($rfq);
        });
    }

    protected function attachProducts(Rfq $rfq)
    {
        // ... your logic to attach products here
        $productIds = fake()->randomElements(Product::pluck('id')->toArray(), rand(1, 5));

        // Create an array of quantities for each product
        $pivotData = [];
        foreach ($productIds as $productId) {
            $pivotData[$productId] = [
                'size' => rand(100, 500) . ' x ' . rand(100, 500) . ' x ' . rand(100, 500) . ' ' . fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']),
                'weight' => rand(10, 500) . ' ' . fake()->randomElement([null, 'Kg', 'N/mm2', 'Kg/m3', 'ltrs', 'tons', 'pounds']),
                'diameter' => rand(100, 500) . fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']),
                'quantity_type' => fake()->randomElement(['Bags', 'Cartoon', 'Pieces', 'Tons', 'Rolls', 'Cubic Meter', 'Each', 'Square Meter', 'Linear Meter', 'Jerry Can', rand(1, 50) . ' Pieces / Cartoon', 'Drum']),
                'color' => fake()->colorName(),
                'item_type' => fake()->randomElement([null, 'Q-1', 'Q-2', 'Q-3', 'Q-4']),
                'quantity' => rand(10, 5000),
            ];
        }

        // Attach products to the RFQ with the specified quantities
        $rfq->products()->attach($pivotData);
    }
}
