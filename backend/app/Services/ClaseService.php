<?php

namespace App\Services;

use App\Models\Clase;
use App\Repositories\ClaseRepository;
use Illuminate\Http\Request;

class ClaseService
{
    
    private ClaseRepository $repository;

    public function __construct(ClaseRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getClases()
    {
        try {
            return Clase::paginate();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getClase(Clase $clase)
    {
        try {
            return $clase;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createClase(array $request)
    {
        try {
            $clase = Clase::create(
                [
                    'teacher_id' => $request['teacher_id'],
                    'student_id' => $request['student_id'],
                    'subject_id' => $request['subject_id'],
                    'scheduled_date' => $request['scheduled_date'],
                    'start_time' => $request['start_time'],
                    'end_time' => $request['end_time'],
                    'description' => $request['description'],
                    'state' => $request['state'],
                ]
            );
            return $clase;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateClase(array $request, Clase $clase)
    {
        try {
            $clase->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteClase(Clase $clase)
    {
        try {
            $clase->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getStudentsByTeacher($teacher_id)
    {
        try {
            return $this->repository->getStudentsByTeacher($teacher_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getTeachersByStudent($student_id){
        try {
            return $this->repository->getTeachersByStudent($student_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateClaseState(array $request, Clase $clase)
    {
        try {
            if($clase->state <> "Finalizado"){
                if($request['state'] ==="Finalizado"){
                    if($clase->state === "Confirmado"){
                        $clase->update(['state'=>$request['state']]);
                    }
                }
                else{
                    $clase->update(['state'=>$request['state']]);
                }
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}