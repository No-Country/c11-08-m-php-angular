<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewiewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = Teacher::all();

        //por cada profesor crear n aleatorio de reviews
        foreach($teachers as $teacher){
            $nReview = random_int(1,20);
            //para cada review tomar estudiante aleatorio existente pero que no se repita los estudiantes para un profesor
            $students_id = fake()->randomElements(DB::table('students')->pluck('id')->toArray(), $nReview, false);
            foreach($students_id as $student_id){
                Review::factory()
                ->create(['teacher_id' => $teacher->id, 'student_id' => $student_id]);
            }
        }
    }
}
