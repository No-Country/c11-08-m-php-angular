<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClaseResource;
use App\Models\Clase;
use App\Services\ClaseService;
use App\Http\Requests\ClaseRequest;

use Mail;
use App\Mail\ClaseMailable;
use App\Mail\ClaseStateMailable;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;

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
            $this->sendMailReserveClass($request);
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
            $this->sendMailState($request->state,$clase);
            $this->service->updateClaseState($request->all(), $clase);
            return new ClaseResource($clase);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    //Enviar Mail
    private function sendMailReserveClass($request){
        $teacher = Teacher::find($request->teacher_id);
        $student = Student::find($request->student_id);
        $subject = Subject::find($request->subject_id);
        //Mail para el estudiante
        $mailDataStudent = [
            'name' => $student->user->first_name,
            'title' => 'Reserva',
            'subjectMail' => 'Reserva en '.$subject->name,
            'body' => 'Realizaste una reserva con el profesor <b>'.$teacher->user->first_name.' 
            '.$teacher->user->last_name.'</b> en la materia <b>'.$subject->name.'</b>. Te estaremos 
            comunicando la respuesta del profesor.'
        ];
        Mail::to($student->user->email)->send(new ClaseMailable($mailDataStudent));
        //Mail para el profesor
        $mailDataTeacher = [
            'name' => $teacher->user->first_name,
            'title' => 'Reserva',
            'subjectMail' => 'Reserva en '.$subject->name,
            'body' => 'El estudiante <b>'.$student->user->first_name.' 
            '.$teacher->user->last_name.'</b> realizo una reserva en la materia <b>'.$subject->name.'</b>. 
            En espera de una respuesta.'
        ];
        Mail::to($teacher->user->email)->send(new ClaseMailable($mailDataTeacher));
    }

    private function sendMailState($state,$clase){
        if($clase->state <> 'Finalizado' && $clase->state <> 'Cancelado' && $state <> 'Finalizado' && $state <> 'Pendiente'){
            $teacher = Teacher::find($clase->teacher_id);
            $student = Student::find($clase->student_id);
            $subject = Subject::find($clase->subject_id);
            $mailData = [
                'subjectMail' => 'Clase '.$state,
                'state' => $state,
                'clase' => $clase,
                'teacher_name' => $teacher->user->first_name . " " . $teacher->user->last_name,
                'subject_name' => $subject->name
            ];
            Mail::to($student->user->email)->send(new ClaseStateMailable($mailData));
        }
        
    }
}
