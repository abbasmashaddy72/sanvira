<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Manufacturer;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierProduct>
 */
class SupplierProductFactory extends Factory
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
        $data = array_rand([null, 10, 20]);
        if ($data == null) {
            $min_price = rand(10, 100);
            $max_price = rand(150, 1000);
            $price = null;
        } else {
            $min_price = null;
            $max_price = null;
            $price = rand(100, 1000);
        }

        return [
            'supplier_id' => Supplier::pluck('id')[$this->faker->numberBetween(1, Supplier::count() - 1)],
            'supplier_product_category_id' => SupplierProductCategory::pluck('id')[$this->faker->numberBetween(1, SupplierProductCategory::count() - 1)],
            'brand_id' => Brand::pluck('id')[$this->faker->numberBetween(1, Brand::count() - 1)],
            'manufacturer_id' => Manufacturer::pluck('id')[$this->faker->numberBetween(1, Manufacturer::count() - 1)],
            'name' => $this->faker->name(),
            'description' => $description,
            'min_oq' => rand(0, 50),
            'max_oq' => rand(50, 100),
            'edt' => rand(0, 100),
            'avb_stock' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'model' => $this->faker->streetSuffix(),
            'item_type' => $this->faker->mimeType(),
            'sku' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'on_sale' => rand(0, 1),
            'images' => ["supplier_products\/bbuRBhb6kARIQp0UBpFOcpsO9LgX4mWJ4ch97YQh.jpg", "supplier_products\/ZHE1IdI33TlnparmqOPSphlWjBhQb8VcjnAruIdc.jpg", "supplier_products\/SUjSiIbFwI1Sk3k3DZXHmBY0EvO3XrpfdGZNLBaz.jpg", "supplier_products\/AXXuV6HCdidI4cd3pQjXyb5c8ak6wni3mJ0IPbCl.jpg", "supplier_products\/oLRSjtwHjOL4YytlnM6juOkiuYHV3SFF4LT28j9v.jpg", "supplier_products\/cE4nxZsw5kUXqxkQOoneM08bggH5VA2Oh4Fqw3aO.jpg", "supplier_products\/oCRLgjYuy4K8rXyNAUhvuNkLlGmekFFvh0eOy9ul.jpg", "supplier_products\/pwhQrIYlovGqCI59Oysh6OFJYUL2O4h2knA1rGJG.jpg", "supplier_products\/LrLaHx0utK0YMO05ubaRgT9C8jHP2bXcQhQNjcxw.jpg", "supplier_products\/2lCdoqpLTqRJHDTWuGXhYu8qmQIr4iE2oUHkHGSg.jpg", "supplier_products\/TllLKGF2dIToUOD8CQQx6GVGtnFjnERvtVpwQP3L.jpg", "supplier_products\/KwuUsMz23Mou55ntAJY0si3Jjj8yOP9SvO3T1odH.jpg"],
            'price' => $price,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ];
    }
}
