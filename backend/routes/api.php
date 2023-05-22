<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinces','App\Http\Controllers\ProvinceController@index');//Todas las provincias
Route::get('/provinces/{id}','App\Http\Controllers\ProvinceController@getProvince');//Una provincia

Route::get('/cities','App\Http\Controllers\CityController@index');//Todas las ciudades
Route::get('/cities/{id}','App\Http\Controllers\CityController@getCity');//Una ciudad
Route::get('/cities/province/{id}','App\Http\Controllers\CityController@citiesProvince');//Ciudades de una provincia

Route::get('/subjects','App\Http\Controllers\SubjectController@index');//Todas las materias
Route::get('/subjects/{id}','App\Http\Controllers\SubjectController@getSubject');//Una materia

Route::get('/teachers/search-by', [TeacherController::class, 'searchTeacherBy']);
Route::apiResource('teachers', TeacherController::class);