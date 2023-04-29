<?php

namespace Database\Factories;

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

        return [
            'supplier_id' => Supplier::pluck('id')[$this->faker->numberBetween(1, Supplier::count() - 1)],
            'supplier_product_category_id' => SupplierProductCategory::pluck('id')[$this->faker->numberBetween(1, SupplierProductCategory::count() - 1)],
            'name' => $this->faker->name(),
            'description' => $description,
            'min_oq' => rand(0, 50),
            'max_oq' => rand(50, 100),
            'edt' => rand(0, 100),
            'avb_stock' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'manufacturer' => $this->faker->company(),
            'brand' => $this->faker->companySuffix(),
            'model' => $this->faker->streetSuffix(),
            'item_type' => $this->faker->mimeType(),
            'sku' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'on_sale' => rand(0, 1),
            'image' => 0,
        ];
    }
}
