<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(){ //Devuelve todas las ciudades.
        $cities = City::all();
        return response()->json($cities);
    }

    public function citiesProvince($province_id){//Devuelva todas las ciudades de una provincia.
        $citiesProvince = City::where('province_id',$province_id)
                        ->get();
        return response()->json($citiesProvince);
    }

    public function getCity($city_id){//Devuelve una ciudad.
        $city = City::find($city_id);
        return response()->json($city);
    }
}
