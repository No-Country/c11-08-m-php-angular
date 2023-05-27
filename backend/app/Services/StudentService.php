<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{

    public function getStudents()
    {
        try {
            return Student::paginate();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getStudent(Student $student)
    {
        try {
            return $student;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
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

    public function createStudent(array $request)
    {
        try {
            $student = Student::create(
                [
                    'user_id' => $request['user_id'],
                    'description' => $request['description'],
                ]
            );
            return $student;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateStudent(array $request, Student $student)
    {
        try {
            $student->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteStudent(Student $student)
    {
        try {
            $student->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}