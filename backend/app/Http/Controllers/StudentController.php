<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentService;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    private StudentService $service;

    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $students = $this->service->getStudents();
            return StudentResource::collection($students);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(StudentRequest $request)
    {
        try {
            $data = $this->service->createStudent($request->all());
            return new StudentResource($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function show(Student $student)
    {
        try {
            $student = $this->service->getStudent($student);
            return new StudentResource($student);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(StudentRequest $request, Student $student)
    {
        try {
            $this->service->updateStudent($request->all(), $student);
            return new StudentResource($student);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function destroy(Student $student)
    {
        try {
            $this->service->deleteStudent($student);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getStudentByUserId($user_id){
        try {
            $student = $this->service->getStudentByUserId($user_id);
            return new StudentResource($student);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
