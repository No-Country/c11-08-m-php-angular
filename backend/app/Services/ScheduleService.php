<?php

namespace App\Services;

use App\Models\Schedule;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;

class ScheduleService
{

    public function getSchedules()
    {
        try {
            return Schedule::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getScheduleByTeacher(int $teacher_id)
    {
        try {
            return Schedule::where('teacher_id', $teacher_id)->get();
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
                    //'name'=> $request['name'], 
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

    public function storeSchedulesByTeacher(array $array, int $teacher_id)
    {
        DB::beginTransaction();
        try {
            $teacher = Teacher::where('id', $teacher_id)->firstOrFail();
            $schedules = $teacher->schedules;
            if($schedules->count() > 0){
                foreach($schedules as $key => $schedule){
                    $array_schedule = $array['schedules'][$key];
                    $this->validateSchedules($array_schedule);
                    $this->updateSchedule($array['schedules'][$key], $schedule);
                }
            }
            else{
                foreach($array['schedules'] as $key => $schedule){
                    $array_schedule = $array['schedules'][$key];
                    $this->validateSchedules($array_schedule);
                    $this->createSchedule($schedule);
                }   
            }
            DB::commit();
            return $teacher->refresh()->schedules;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function validateSchedules(array $schedule)
    {
        if($schedule['start_morning'] == $schedule['end_morning'] && isset($schedule['start_morning']) && isset($schedule['end_morning'])
        || $schedule['start_afternoon'] == $schedule['end_afternoon'] && isset($schedule['start_afternoon']) && isset($schedule['end_afternoon'])
        || $schedule['start_night'] == $schedule['end_night'] && isset($schedule['start_night']) && isset($schedule['end_night'])){
            throw New Exception('Horario de inicio no puede ser igual al horario final');
        }
        if($schedule['start_morning'] > $schedule['end_morning']
        || $schedule['start_afternoon'] > $schedule['end_afternoon']
        || $schedule['start_night'] > $schedule['end_night']){
            throw New Exception('Horario de inicio no puede ser mayor al horario final');
        }
    }
    
}