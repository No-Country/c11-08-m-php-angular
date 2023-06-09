<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index(){ //Devuelve todas las ciudades.
        $cities = City::orderBy('name')->get();
        return response()->json($cities);
    }

    public function citiesProvince($province_id){//Devuelva todas las ciudades de una provincia.
        $citiesProvince = City::where('province_id',$province_id)
                        ->orderBy('name')
                        ->get();
        return response()->json($citiesProvince);
    }

    public function getCity($city_id){//Devuelve una ciudad.
        $city = City::find($city_id);
        return response()->json($city);
    }

    public function getCitiesByName($name){
        $cities = City::leftJoin('provinces','cities.province_id','=','provinces.id')
                        ->select('cities.id',DB::raw('(CONCAT(cities.name,", ",provinces.name)) as city'))
                        ->where(DB::raw('upper(cities.name)'),'LIKE','%'.strtoupper($name).'%')
                        ->orWhere(DB::raw('upper(provinces.name)'),'LIKE','%'.strtoupper($name).'%')
                        ->orderBy('city')
                        ->get();
        return response()->json($cities);
    }
}
