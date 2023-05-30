<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Services\SubjectService;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    private SubjectService $service;

    public function __construct(SubjectService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    public function getSubject($subject_id){
        $subject = Subject::find($subject_id);
        return response()->json($subject);
    }

    //Obtener todas las materias dado un nombre/texto"
    public function subjectsByText($name){
        try {
            $subjects = Subject::where(DB::raw('upper(name)'),'LIKE','%'.strtoupper($name).'%')
                            ->get();
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
        
    }

    public function storeSubjectByTeacher(Request $request)
    {
        try {
            $subject = $this->service->storeSubjectByTeacher($request->all());
            return response()->json($subject);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function deleteSubjectByTeacher(int $teacher_id, int $subject_id)
    {
        try {
            $this->service->deleteSubjectByTeacher($teacher_id, $subject_id);
            return response('', 204);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getSubjectsByTeacher(int $teacher_id)
    {
        try {
            $subjects = $this->service->getSubjectsByTeacher($teacher_id);
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function storeSubjectsByTeacher(Request $request)
    {
        try {
            $subjects = $this->service->storeSubjectsByTeacher($request->all());
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
