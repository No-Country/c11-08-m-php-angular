<?php

namespace App\Repositories;

use App\Models\Clase;
use App\Models\Schedule;

class ScheduleRepository
{

    public function getScheduleByTeacherByDay(int $day, int $teacher_id)
    {
        $schedule = Schedule::where('active', true)
            ->where('teacher_id', $teacher_id)
            ->where('day', $day)
            ->first([
                'start_morning', 'end_morning',
                'start_afternoon', 'end_afternoon',
                'start_night', 'end_night'
            ]);
        return $schedule;
    }
    
    public function getClassByTeacherByDayByHour(int $teacher_id, string $date, string $start_time, string $end_time)
    {
        $class = Clase::where('teacher_id', $teacher_id)
            ->whereDate('scheduled_date', $date)
            ->whereTime('start_time', $start_time.':00')
            ->whereTime('end_time', $end_time.':00')
            ->first();
        return $class;
    }
}