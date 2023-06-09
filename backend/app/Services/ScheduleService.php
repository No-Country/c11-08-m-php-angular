<?php

namespace App\Services;

use App\Models\Schedule;
use App\Models\Teacher;
use App\Repositories\ScheduleRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class ScheduleService
{

    private ScheduleRepository $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

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

    public function saveSchedulesByTeacher(array $array, int $teacher_id)
    {
        DB::beginTransaction();
        try {
            $teacher = Teacher::where('id', $teacher_id)->firstOrFail();
            $schedules = $teacher->schedules;
            if($schedules->count() > 0){
                foreach($schedules as $key => $schedule){
                    $schedule->teacher_id = $teacher_id;
                    $array_schedule = $array['schedules'][$key];
                    $this->validateSchedules($array_schedule);
                    $this->updateSchedule($array['schedules'][$key], $schedule);
                }
            }
            else{
                foreach($array['schedules'] as $key => $schedule){
                    $schedule['teacher_id'] = $teacher_id;
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
    
    public function getUnreservedHoursByDayByTeacher(array $array)
    {
        $unreservedIntervals = [];
        $intervals = $this->getIntervals($array);
        foreach ($intervals as $turn => $value) {
            foreach ($value as $key => $hour) {
                $class = $this->repository->getClassByTeacherByDayByHour($array['teacher_id'], $array['date'], $hour['start'], $hour['end']);
                if(!$class){
                    $unreservedIntervals[$turn][] = $hour;
                }
            }
        }
        return $unreservedIntervals;
    }

    public function getIntervals(array $array)
    {
        $teacher_id = $array['teacher_id'];
        $date = $array['date'];
        $dateCarbon = new Carbon($date);
        $day = $dateCarbon->dayOfWeek;

        $schedule = $this->repository->getScheduleByTeacherByDay($day, $teacher_id);

        if(!$schedule){
            return [];
        }

        $morningIntervals = $this->getHoursIntervals($schedule->start_morning, $schedule->end_morning);
        $afternoonIntervals = $this->getHoursIntervals($schedule->start_afternoon, $schedule->end_afternoon);
        $nightIntervals = $this->getHoursIntervals($schedule->start_night, $schedule->end_night);
    
        $data = [];
        $data['morning'] = $morningIntervals;
        $data['afternoon'] = $afternoonIntervals;
        $data['night'] = $nightIntervals;
        return $data;
    }
    
    private function getHoursIntervals($start, $end)
    {
        if(!$start && !$end){
            return [];
        }

        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervals = [];
        while ($start < $end) {
            $interval = [];
            $interval['start'] = $start->format('H:i');
            $start->addHour();
            $interval['end'] = $start->format('H:i');
            $intervals[] = $interval;
        }

        return $intervals;
    }

}