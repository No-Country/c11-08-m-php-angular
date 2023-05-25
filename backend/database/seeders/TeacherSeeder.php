<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::all();

         //100 profesores
         Teacher::factory()
         ->count(100)
         // ->hasAttached($subjects)
         ->create();

        //Pivote: cada profesor tiene 1 a 6 materias
        Teacher::all()->each(function ($teacher) use ($subjects) { 
            $teacher->subjects()->attach(
                $subjects->random(rand(1, 6))->pluck('id')->toArray(),
                [
                    'years_experience' => fake()->numberBetween(3,10),
                    'level' => fake()->randomElement(['Básico', 'Intermedio', 'Avanzado']), 
                    'certificate_file' => fake()->sentence(),
                ]
            ); 
        });
    }
}
