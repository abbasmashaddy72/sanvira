<?php

namespace Database\Factories;

use App\Models\Rfq;
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
            'rfq_id' => $this->faker->randomElement(Rfq::pluck('id')->toArray()),
            'status' => $this->faker->randomElement(['Pending', 'Quotation Sent', 'Quotation Received', 'Order Placed', 'Delivered Note Received', 'Due', 'Paid']),
            'rfq_submission_date' => $this->faker->date(),
        ];
    }
}
