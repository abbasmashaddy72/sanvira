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
            'images' => 0,
            'feedback' => $this->faker->realText(),
        ];
    }
}
