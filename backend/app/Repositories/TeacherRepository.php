<?php

namespace App\Repositories;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherRepository
{

    public function searchTeacherBy(Request $request, $filters = [], $availability = [], $order)
    {

        $teachers = DB::table('teachers as t')
            ->select('t.*')
            // ->select('u.*', 'c.name as city_name', 'c.province_id', 'p.name as province_name', 't.*',
            //  'sch.day', 'sch.name as schedule_name','sch.active as schedule_active', 'sch.start_morning', 'sch.end_morning', 'sch.start_afternoon', 'sch.end_afternoon', 'sch.start_night', 'sch.end_night',
            //   'r.*', 'st.*', 'ts.*', 's.*')
            ->LeftJoin('users as u', 'u.id', '=', 't.user_id')
            ->LeftJoin('cities as c', 'u.city_id', '=', 'c.id')
            ->LeftJoin('provinces as p', 'c.province_id', '=', 'p.id')
            ->LeftJoin('schedules as sch', 'sch.teacher_id', '=', 't.id')
            ->LeftJoin('reviews as r', 'r.teacher_id', '=', 't.id')
            ->LeftJoin('students as st', 'r.student_id', '=', 'st.id')
            ->LeftJoin('teachers_subjects as ts', 'ts.teacher_id', '=', 't.id')
            ->LeftJoin('subjects as s', 'ts.subject_id', '=', 's.id')

            ->where(function ($result) use ($request, $filters, $availability) {
                foreach ($filters as $key => $value) {
                    $result->where($key, '=', $value);
                }
                $result->where(function ($query) use ($availability){
                    foreach($availability as $turn){
                        $query->orWhereNotNull($turn[0])
                        ->whereNotNull($turn[1]);
                    }
                });
                if ($request->price) {
                    $result->where(function ($query) use ($request){
                            $query->whereBetween('price_one_class', [$request->price])
                                  ->orWhereBetween('price_two_classes', [$request->price])
                                  ->orWhereBetween('price_four_classes', [$request->price]);
                    });
                }
            })
            ->distinct('t.id')
            ->get();

        $array = [];
        foreach ($teachers as $teacher) {
            $array[] = $teacher->id;
        }
        $teachers = Teacher::whereIn('id', $array)->orderBy($order[0], $order[1])->paginate();

        return $teachers;
    }
}
