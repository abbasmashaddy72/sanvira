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
        $images = ["supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg", "supplier_products\/ZHE1IdI33TlnparmqOPSphlWjBhQb8VcjnAruIdc.jpg", "supplier_products\/SUjSiIbFwI1Sk3k3DZXHmBY0EvO3XrpfdGZNLBaz.jpg", "supplier_products\/AXXuV6HCdidI4cd3pQjXyb5c8ak6wni3mJ0IPbCl.jpg", "supplier_products\/oLRSjtwHjOL4YytlnM6juOkiuYHV3SFF4LT28j9v.jpg", "supplier_products\/cE4nxZsw5kUXqxkQOoneM08bggH5VA2Oh4Fqw3aO.jpg", "supplier_products\/oCRLgjYuy4K8rXyNAUhvuNkLlGmekFFvh0eOy9ul.jpg", "supplier_products\/pwhQrIYlovGqCI59Oysh6OFJYUL2O4h2knA1rGJG.jpg", "supplier_products\/LrLaHx0utK0YMO05ubaRgT9C8jHP2bXcQhQNjcxw.jpg", "supplier_products\/2lCdoqpLTqRJHDTWuGXhYu8qmQIr4iE2oUHkHGSg.jpg", "supplier_products\/TllLKGF2dIToUOD8CQQx6GVGtnFjnERvtVpwQP3L.jpg", "supplier_products\/KwuUsMz23Mou55ntAJY0si3Jjj8yOP9SvO3T1odH.jpg"];

        return [
            'brand_id' => Brand::pluck('id')[$this->faker->numberBetween(1, Brand::count() - 1)],
            'account_type' => $account_type[array_rand($account_type)],
            'transaction_type' => $transaction_type[array_rand($transaction_type)],
            'amount' => rand(100, 1000),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'end_days' => rand(0, 120),
            'image' => $images[array_rand($images)],
            'status' => $status[array_rand($status)],
        ];
    }
}