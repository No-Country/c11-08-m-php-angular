<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = Teacher::all();

        //por cada profesor crear 6 schedules
        foreach($teachers as $teacher){
            Schedule::factory()->create(['day' => 1, 'name' => 'Lunes', 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 2, 'name' => 'Martes', 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 3, 'name' => 'Miércoles', 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 4, 'name' => 'Jueves', 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 5, 'name' => 'Viernes', 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 6, 'name' => 'Sábado', 'teacher_id' => $teacher->id]);
        }
    }
}
