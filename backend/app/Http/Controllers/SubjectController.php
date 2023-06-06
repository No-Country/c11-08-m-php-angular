<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListSubjectRequest;
use App\Http\Requests\StoreSubjectRequest;
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
        $subjects = Subject::orderBy('name')->get();
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
                                ->orderBy('name')
                                ->get();
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
        
    }

    public function storeSubjectByUser(StoreSubjectRequest $request)
    {
        try {
            $subject = $this->service->storeSubjectByUser($request->all());
            return response()->json($subject);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function deleteSubjectByUser(int $user_id, int $subject_id)
    {
        try {
            $this->service->deleteSubjectByUser($user_id, $subject_id);
            return response()->json(['type' => 'success', 'message' => 'Eliminado exitosamente'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function getSubjectsByUser(int $user_id)
    {
        try {
            $subjects = $this->service->getSubjectsByUser($user_id);
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }

    public function storeSubjectsByUser(StoreListSubjectRequest $request)
    {
        try {
            $subjects = $this->service->storeSubjectsByUser($request->all());
            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'type' => 'error'],500);
        }
    }
}
