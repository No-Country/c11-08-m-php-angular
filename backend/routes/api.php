<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
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
Route::get('/subjects/name/{name}','App\Http\Controllers\SubjectController@subjectsByText');//Todas las materias dado un string

Route::get('/teachers/search', [TeacherController::class, 'searchTeacherBy']); //Obtener profesores por
Route::get('/teachers', [TeacherController::class, 'index']); //Todos los profesores
Route::get('/teachers/{teacher}', [TeacherController::class, 'show']); //Obtener un profesor
Route::get('/reviews/teacher/{teacher_id}', [ReviewController::class, 'getReviewsByTeacher']); //Obtener reviews por profesor

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('teachers', TeacherController::class)->except(['index', 'show']);
    Route::apiResource('reviews', ReviewController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
    
});

Route::get('/students',[StudentController::class,'index']);//Todas los estudiantes
Route::get('/students/{student}',[StudentController::class,'show']);//Obtener estudiante
Route::apiResource('students', StudentController::class)->except(['index', 'show']);