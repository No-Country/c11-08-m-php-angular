<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{

    public function createStudentByRegister(array $request)
    {
        try {
            $student = Student::create(
                [
                    'user_id' => $request['user_id']
                ]
            );
            return $student;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}