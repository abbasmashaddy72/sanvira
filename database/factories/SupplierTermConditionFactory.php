<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierTermCondition>
 */
class SupplierTermConditionFactory extends Factory
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
            'description' => $description,
        ];
    }
}
