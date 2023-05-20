<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        return [
            'user_id' => User::factory()->state(['role' => 'Profesor']),
            'title' => fake()->text(255),
            'about_me' => fake()->paragraphs(4, true),
            'about_class' => fake()->paragraphs(3, true),
            'job_title' => fake('en_US')->jobTitle(),
            'years_experience' => fake()->numberBetween(3,10),
            'price_one_class' => fake()->randomFloat(2, 200, 450),
            'price_two_classes' => fake()->randomFloat(2, 500, 700),
            'price_four_classes' => fake()->randomFloat(2, 750, 900),
            'certificate_file' => null,
            'sample_class' => fake()->boolean(60),
        ];
    }
}
