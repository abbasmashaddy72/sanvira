<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrandTransaction>
 */
class BrandTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $account_type = ['Trail', 'Regular', 'Featured'];
        $transaction_type = ['Paid', 'Unpaid', 'Pending'];
        $status = ['Active', 'InActive', 'Expired'];
        return [
            'brand_id' => Brand::pluck('id')[$this->faker->numberBetween(1, Brand::count() - 1)],
            'account_type' => $account_type[array_rand($account_type)],
            'transaction_type' => $transaction_type[array_rand($transaction_type)],
            'amount' => rand(100, 1000),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'end_days' => rand(0, 120),
            'image' => "supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg",
            'status' => $status[array_rand($status)],
        ];
    }
}
