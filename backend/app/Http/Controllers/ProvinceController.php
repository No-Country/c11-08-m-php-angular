<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index(){
        $provincias = Province::orderBy('name')->get();
        return response()->json($provincias);
    }

    public function getProvince($id){
        $province = Province::find($id);
        return response()->json($province);
    }
}
