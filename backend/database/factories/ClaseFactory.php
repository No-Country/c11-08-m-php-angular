<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clase>
 */
class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = fake()->dateTimeBetween('-3 months', '+1 months')->format('Y-m-d');
        if($date > now()){
            $state = fake()->randomElement(['Cancelado', 'Confirmado', 'Pendiente']);
        }
        else{
            $state = fake()->randomElement(['Cancelado', 'Finalizado']);
        }

        $schedules = fake()->randomElement([
            ['08:00', '10:00'],
            ['10:00', '12:00'],
            ['12:00', '14:00'],
            ['14:00', '16:00'],
            ['16:00', '18:00'],
            ['16:00', '20:00'],
            ['20:00', '22:00'],
        ]);

        return [
            'teacher_id' => Teacher::factory(),
            'student_id' => Student::factory(),
            'subject_id' => Subject::all()->random()->id,
            'scheduled_date' => $date,
            'start_time' => $schedules[0],
            'end_time' => $schedules[1],
            'description' => fake()->paragraphs(2, true),
            'state' => $state,
        ];
    }
}
