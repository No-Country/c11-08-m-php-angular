<?php

namespace Database\Seeders;

use App\Models\Clase;
use App\Models\Review;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $teachers = Teacher::all();
        //por cada profesor crear n aleatorio de clases
        foreach($teachers as $teacher){
            $nClases = random_int(1,15);
            //para cada clase tomar estudiante aleatorio existente
            $students_id = fake()->randomElements(DB::table('students')->pluck('id')->toArray(), $nClases, true);
            foreach($students_id as $student_id){
                Clase::factory()->create(['teacher_id' => $teacher->id, 'student_id' => $student_id]);
            }
        }

        $classes = DB::table('classes')
            ->select('student_id', 'teacher_id')
            ->distinct('student_id')
            ->get();
        foreach($classes as $class){
            $rand = fake()->boolean(60);
            if($rand){
                Review::factory()->create(['teacher_id' => $class->teacher_id, 'student_id' => $class->student_id]);
            }
        }

    }
}
