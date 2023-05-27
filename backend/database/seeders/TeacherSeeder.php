<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Str;
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
        
        $teachers = Teacher::all();
        //Pivote: se asocian de 2 hasta 6 profesores a cada materia
        $subjects->each(function ($subject) use ($teachers) {
            if($subject->teachers->count() < 2){
                $subject->teachers()->attach(
                    $teachers->random(rand(2, 6))->pluck('id')->toArray(),
                    [
                        'years_experience' => fake()->numberBetween(3,10),
                        'level' => fake()->randomElement(['Básico', 'Intermedio', 'Avanzado']), 
                        'certificate_file' => Str::random(40),
                        ]
                ); 
            }
        });
        
        //Pivote: si hay profesores con menos de 2 materias se lo asocia a 1 materia
        $teachers->each(function ($teacher) use ($subjects) {
            if($teacher->subjects->count() < 2){
                $teacher->subjects()->attach(
                    $subjects->random(1)->pluck('id')->toArray(),
                    [
                        'years_experience' => fake()->numberBetween(3,10),
                        'level' => fake()->randomElement(['Básico', 'Intermedio', 'Avanzado']), 
                        'certificate_file' => Str::random(40),
                    ]
                );
            }    
        });
        

    }
}
