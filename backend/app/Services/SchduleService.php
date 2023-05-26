<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleService
{

    public function getSchedules()
    {
        try {
            return Schedule::paginate();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getSchedule(Schedule $schedule)
    {
        try {
            return $schedule;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createSchedule(array $request)
    {
        try {
            $schedule = Schedule::create(
                [

                    'day'=> $request['day'],
                    'name'=> $request['name'], 
                    'active'=> $request['active'], 
                    'start_morning'=> $request['start_morning'],
                    'end_morning'=> $request['end_morning'],
                    'start_afternoon'=> $request['start_afternoon'],
                    'end_afternoon'=> $request['end_afternoon'],
                    'start_night'=> $request['start_night'],
                    'end_night'=> $request['end_night'],
                    'teacher_id'=> $request['teacher_id'],
                ]
            );
            return $schedule;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateSchedule(array $request, Schedule $schedule)
    {
        try {
            $schedule->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteSchedule(Schedule $schedule)
    {
        try {
            $schedule->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    
}