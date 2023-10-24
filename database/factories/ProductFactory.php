<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\Vendor;
use App\Models\Category;
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
        $paragraphs = $this->faker->paragraphs(6, false);
        $title = $this->faker->realText(50);
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
        $title = $this->faker->name();

        return [
            'category_id' => $this->faker->randomElement(Category::where('parent_id', '!=', 0)->pluck('id')->toArray()),
            'country_id' => Country::pluck('id')[$this->faker->numberBetween(1, Country::count() - 1)],
            'brand_id' => Brand::pluck('id')[$this->faker->numberBetween(1, Brand::count() - 1)],
            'vendor_id' => Vendor::pluck('id')[$this->faker->numberBetween(1, Vendor::count() - 1)],
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $description,
            'edt' => rand(0, 100),
            'avb_stock' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'barcode' => $this->faker->randomNumber(),
            'own_sku' => $this->faker->randomNumber(),
            'length' => rand(1, 50),
            'length_units' => $this->faker->randomElement(['m', 'cm', 'mm', 'in', 'ft']),
            'breadth' => rand(1, 50),
            'breadth_units' => $this->faker->randomElement(['m', 'cm', 'mm', 'in', 'ft']),
            'width' => rand(1, 50),
            'width_units' => $this->faker->randomElement(['m', 'cm', 'mm', 'in', 'ft']),
            'weight' => rand(1, 50),
            'weight_units' => $this->faker->randomElement(['kg', 'g', 't', 'oz']),
            'model' => $this->faker->streetSuffix(),
            'item_type' => $this->faker->mimeType(),
            'sku' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'on_sale' => rand(0, 1),
            'images' => $random_array,
            'verification' => rand(0, 1),
        ];
    }
}