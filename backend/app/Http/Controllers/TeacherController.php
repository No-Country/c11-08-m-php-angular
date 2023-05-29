<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Http\Resources\UserResource;
use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    private TeacherService $service;

    public function __construct(TeacherService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $teachers = $this->service->getTeachers();
            return TeacherResource::collection($teachers);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(TeacherRequest $request)
    {
        try {
            $data = $this->service->createTeacher($request->all());
            return new TeacherResource($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function show(Teacher $teacher)
    {
        try {
            $teacher = $this->service->getTeacher($teacher);
            return new TeacherResource($teacher);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        try {
            $this->service->updateTeacher($request->all(), $teacher);
            return new TeacherResource($teacher);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            $this->service->deleteTeacher($teacher);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function searchTeacherBy(Request $request)
    {
        try {
            $teachers = $this->service->searchTeacherBy($request);
            return TeacherResource::collection($teachers);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'], 500);
        }
    }

    public function getTeacherByUser(int $user_id)
    {
        try {
            $teacher = $this->service->getTeacherByUser($user_id);
            return new TeacherResource($teacher);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
