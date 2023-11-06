<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphs = fake()->paragraphs(6, false);
        $title = fake()->realText(50);
        $description = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $description .= "<p>{$para}</p>";
        }
        $images = ["products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg", "products\/ZHE1IdI33TlnparmqOPSphlWjBhQb8VcjnAruIdc.jpg", "products\/SUjSiIbFwI1Sk3k3DZXHmBY0EvO3XrpfdGZNLBaz.jpg", "products\/AXXuV6HCdidI4cd3pQjXyb5c8ak6wni3mJ0IPbCl.jpg", "products\/oLRSjtwHjOL4YytlnM6juOkiuYHV3SFF4LT28j9v.jpg", "products\/cE4nxZsw5kUXqxkQOoneM08bggH5VA2Oh4Fqw3aO.jpg", "products\/oCRLgjYuy4K8rXyNAUhvuNkLlGmekFFvh0eOy9ul.jpg", "products\/pwhQrIYlovGqCI59Oysh6OFJYUL2O4h2knA1rGJG.jpg", "products\/LrLaHx0utK0YMO05ubaRgT9C8jHP2bXcQhQNjcxw.jpg", "products\/2lCdoqpLTqRJHDTWuGXhYu8qmQIr4iE2oUHkHGSg.jpg", "products\/TllLKGF2dIToUOD8CQQx6GVGtnFjnERvtVpwQP3L.jpg", "products\/KwuUsMz23Mou55ntAJY0si3Jjj8yOP9SvO3T1odH.jpg"];
        $n = 5;
        $random_keys = array_rand($images, $n);
        $random_array = [];
        foreach ($random_keys as $key) {
            $random_array[] = $images[$key];
        }
        $title = fake()->unique()->name();

        return [
            'category_id' => fake()->randomElement(Category::where('parent_id', '!=', 0)->pluck('id')->toArray()),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $description,
            'edt' => rand(0, 100),
            'model' => fake()->streetSuffix(),
            'on_sale' => rand(0, 1),
            'images' => $random_array,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Create variations for the product
            $length = null;
            $breadth = null;
            $width = null;
            $diameter = null;
            $measurement_units = fake()->randomElement([null, 'Feet', 'Inches', 'Yards', 'Meters', 'mm', 'cm']);
            $weight = null;
            $weight_units = fake()->randomElement([null, 'Kg', 'N/mm2', 'Kg/m3', 'ltrs', 'tons', 'pounds']);

            if ($measurement_units != null) {
                $length = rand(10, 10000);
                $breadth = rand(10, 10000);
                $width = rand(10, 10000);
                $diameter = rand(10, 10000);
            }
            if ($weight_units != null) {
                $weight = rand(10, 10000);
            }

            ProductVariation::factory()
                ->count(rand(1, 5)) // Define the number of variations for the product
                ->create([
                    'product_id' => $product->id,
                    'country_id' => fake()->randomElement(Country::pluck('id')->toArray()),
                    'brand_id' => fake()->randomElement(Brand::pluck('id')->toArray()),
                    'vendor_id' => fake()->randomElement(Vendor::pluck('id')->toArray()),
                    'avb_stock' => rand(1000, 10000000),
                    'sku' => Str::upper(bin2hex(random_bytes(5))),
                    'barcode' => fake()->ean13(),
                    'length' => $length,
                    'breadth' => $breadth,
                    'width' => $width,
                    'diameter' => $diameter,
                    'measurement_units' => $measurement_units,
                    'weight' => $weight,
                    'weight_units' => $weight_units,
                    'quantity_type' => fake()->randomElement(['Bags', 'Cartoon', 'Pieces', 'Tons', 'Rolls', 'Cubic Meter', 'Each', 'Square Meter', 'Linear Meter', 'Jerry Can', rand(1, 50) . ' Pieces / Cartoon', 'Drum']),
                    'color' => fake()->colorName(),
                    'item_type' => fake()->randomElement([null, 'Q-1', 'Q-2', 'Q-3', 'Q-4']),
                    'max_discount' => rand(0, 100),
                    'max_discount_unit' => fake()->randomElement(['Regular', 'Percentage']),
                    'tax_percentage' => rand(0, 100),
                    'min_price' => rand(50, 250),
                    'max_price' => rand(500, 50000),
                    'min_order_quantity' => rand(10, 50),
                    'max_order_quantity' => rand(100, 250),
                ]);
        });
    }
}
