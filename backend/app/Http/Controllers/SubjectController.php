<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
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
}
