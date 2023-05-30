<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClaseResource;
use App\Models\Clase;
use App\Services\ClaseService;
use App\Http\Requests\ClaseRequest;

class ClaseController extends Controller
{
    private ClaseService $service;

    public function __construct(ClaseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $clases = $this->service->getClases();
            return ClaseResource::collection($clases);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function store(ClaseRequest $request)
    {
        try {
            $data = $this->service->createClase($request->all());
            return new ClaseResource($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function show(Clase $clase)
    {
        try {
            $clase = $this->service->getClase($clase);
            return new ClaseResource($clase);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function update(ClaseRequest $request, Clase $clase)
    {
        try {
            $this->service->updateClase($request->all(), $clase);
            return new ClaseResource($clase);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function destroy(Clase $clase)
    {
        try {
            $this->service->deleteClase($clase);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getStudentsByTeacher($teacher_id)
    {
        try {
            $students = $this->service->getStudentsByTeacher($teacher_id);
            return ClaseResource::collection($students);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getTeachersByStudent($student_id)
    {
        try {
            $teachers = $this->service->getTeachersByStudent($student_id);
            return ClaseResource::collection($teachers);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function updateClaseState(Request $request, Clase $clase)
    {
        try {
            $this->service->updateClaseState($request->all(), $clase);
            return new ClaseResource($clase);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
