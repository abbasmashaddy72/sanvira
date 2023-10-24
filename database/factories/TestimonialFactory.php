<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')[$this->faker->numberBetween(1, User::count() - 1)],
            'designation' => $this->faker->firstName(),
            'logo' => null,
            'message' => $this->faker->realText(),
            'show_designation' => rand(0, 1),
            'rating' => rand(1, 5),
        ];
    }
}
