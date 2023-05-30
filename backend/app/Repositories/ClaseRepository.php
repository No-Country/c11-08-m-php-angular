<?php

namespace App\Repositories;

use App\Models\Clase;
use Illuminate\Support\Facades\DB;

class ClaseRepository
{

    public function getStudentsByTeacher($teacher_id){
        /*
        $students_id = Clase::where('teacher_id',$teacher_id)
                        ->select('student_id')
                        ->distinct()
                        ->get();
        $students = Student::whereIn('id',$students_id)
                            ->get();
                            */
        $students = Clase::where('teacher_id',$teacher_id)
                        ->get();
        return $students;
    }

    public function getTeachersByStudent($student_id){
        $teachers = Clase::where('student_id',$student_id)
                        ->get();
        return $teachers;
    }
}
