<?php

namespace Database\Factories;

use App\Models\SubContractor;
use App\Models\SubContractorService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubContractorService>
 */
class SubContractorServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sub_contractor_id' => SubContractor::pluck('id')[$this->faker->numberBetween(1, SubContractor::count() - 1)],
            'name' => $this->faker->name(),
            'image' => 0,
            'parent_id' => rand(0, 12),
        ];
    }
}
