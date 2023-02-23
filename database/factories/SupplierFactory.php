<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'user_id' => User::pluck('id')[$this->faker->numberBetween(1, User::count() - 1)],
            'company_name' => $this->faker->company(),
            'company_email' => $this->faker->companyEmail(),
            'company_address' => $this->faker->streetAddress(),
            'company_number' => rand(7000000000, 9000000000),
            'company_locality' => $this->faker->streetName(),
            'tagline' => $this->faker->realText(),
            'logo' => 0,
            'yoe' => rand(1994, 2020),
            'website_url' => $this->faker->url(),
            'description' => $description,
            'terms_conditions' => $description,
            'contact_person_name' => $this->faker->name(),
            'contact_person_email' => $this->faker->email(),
            'contact_person_number' => rand(7000000000, 9000000000),
        ];
    }
}
