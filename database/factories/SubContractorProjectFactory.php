<?php

namespace Database\Factories;

use App\Models\SubContractor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubContractorProject>
 */
class SubContractorProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(6, false);
        $title = $this->faker->realText(50);
        $description = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $description .= "<p>{$para}</p>";
        }

        return [
            'sub_contractor_id' => SubContractor::pluck('id')[$this->faker->numberBetween(1, SubContractor::count() - 1)],
            'name' => $this->faker->name(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'description' => $description,
            'year_range' => rand(1994, 2023) . '-' . rand(1994, 2023),
            'images' => ["supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg", "supplier_products\/ZHE1IdI33TlnparmqOPSphlWjBhQb8VcjnAruIdc.jpg", "supplier_products\/SUjSiIbFwI1Sk3k3DZXHmBY0EvO3XrpfdGZNLBaz.jpg", "supplier_products\/AXXuV6HCdidI4cd3pQjXyb5c8ak6wni3mJ0IPbCl.jpg", "supplier_products\/oLRSjtwHjOL4YytlnM6juOkiuYHV3SFF4LT28j9v.jpg", "supplier_products\/cE4nxZsw5kUXqxkQOoneM08bggH5VA2Oh4Fqw3aO.jpg", "supplier_products\/oCRLgjYuy4K8rXyNAUhvuNkLlGmekFFvh0eOy9ul.jpg", "supplier_products\/pwhQrIYlovGqCI59Oysh6OFJYUL2O4h2knA1rGJG.jpg", "supplier_products\/LrLaHx0utK0YMO05ubaRgT9C8jHP2bXcQhQNjcxw.jpg", "supplier_products\/2lCdoqpLTqRJHDTWuGXhYu8qmQIr4iE2oUHkHGSg.jpg", "supplier_products\/TllLKGF2dIToUOD8CQQx6GVGtnFjnERvtVpwQP3L.jpg", "supplier_products\/KwuUsMz23Mou55ntAJY0si3Jjj8yOP9SvO3T1odH.jpg"],
            'feedback' => $this->faker->realText(),
        ];
    }
}
