<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => fake()->paragraph(),
            'qualification' => fake()->randomElement([1,2,3,4,5]), 
            'teacher_id' => Teacher::factory(), 
            'student_id' => Student::factory(),
        ];
    }
}
