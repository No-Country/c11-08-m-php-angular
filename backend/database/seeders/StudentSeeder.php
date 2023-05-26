<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::all();

        //300 alumnos
        Student::factory()
            ->count(300)
            // ->hasAttached($subjects)
            ->create();

        //Pivote: cada estudiante tiene 1 a 6 materias
        Student::all()->each(function ($student) use ($subjects) { 
            $student->subjects()->attach(
                $subjects->random(rand(1, 6))->pluck('id')->toArray()
            ); 
        });
    }
}
