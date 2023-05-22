<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

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
}
