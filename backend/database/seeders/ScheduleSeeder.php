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
            Schedule::factory()->create(['day' => 1, 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 2, 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 3, 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 4, 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 5, 'teacher_id' => $teacher->id]);
            Schedule::factory()->create(['day' => 6, 'teacher_id' => $teacher->id]);
        }
    }
}
