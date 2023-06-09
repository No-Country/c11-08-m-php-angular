<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

Route::get('/schedule','App\Http\Controllers\ScheduleController@index');
Route::get('/schedule/{schedule}','App\Http\Controllers\ScheduleController@show');
Route::get('/schedule/teacher/{teacher_id}','App\Http\Controllers\ScheduleController@getScheduleByTeacher');//Obtener horarios por profesor

Route::get('/cities','App\Http\Controllers\CityController@index');//Todas las ciudades
Route::get('/cities/{id}','App\Http\Controllers\CityController@getCity');//Una ciudad
Route::get('/cities/name/{name}','App\Http\Controllers\CityController@getCitiesByName');//Obtener las ciudades dado un nombre
Route::get('/cities/province/{id}','App\Http\Controllers\CityController@citiesProvince');//Ciudades de una provincia

Route::get('/subjects','App\Http\Controllers\SubjectController@index');//Todas las materias
Route::get('/subjects/{id}','App\Http\Controllers\SubjectController@getSubject');//Una materia
Route::get('/subjects/name/{name}','App\Http\Controllers\SubjectController@subjectsByText');//Todas las materias dado un string
Route::get('/subjects/user/{user_id}', [SubjectController::class, 'getSubjectsByUser']); //Obtener materias por usuario (Profesor o Estudiante)

Route::get('/users/teacher/{teacher_id}', [UserController::class, 'getUserByTeacher']); //Obtener un usuario por profesor

Route::post('/teachers/search', [TeacherController::class, 'searchTeacherBy']); //Obtener profesores por
Route::get('/teachers', [TeacherController::class, 'index']); //Todos los profesores
Route::get('/teachers/{teacher}', [TeacherController::class, 'show']); //Obtener un profesor

Route::get('/reviews/teacher/{teacher_id}', [ReviewController::class, 'getReviewsByTeacher']); //Obtener reviews por profesor

Route::get('/plans', [PlanController::class, 'index']); //Todos los planes
Route::get('/plans/{plan}', [PlanController::class, 'show']); //Obtener un plan

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('teachers', TeacherController::class)->except(['index', 'show']);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('plans', PlanController::class)->except(['index', 'show']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/changePassword', [AuthController::class, 'changePassword']);

    Route::get('/teachers/user/{user_id}', [TeacherController::class, 'getTeacherByUser']); //Obtener un profesor por usuario

    Route::post('/subjects/user', [SubjectController::class, 'storeSubjectByUser']); //Guardar materia por usuario
    Route::post('/subjects/user/list', [SubjectController::class, 'storeSubjectsByUser']); //Guardar lista de materias por usuario
    Route::delete('/subjects/user/{user_id}/{subject_id}', [SubjectController::class, 'deleteSubjectByUser']); //Eliminar materia por usuario

    Route::post('/schedule','App\Http\Controllers\ScheduleController@store');
    Route::put('/schedule/teacher/{teacher_id}','App\Http\Controllers\ScheduleController@storeSchedulesByTeacher');//Actualizar y Guardar horarios por profesor
    Route::put('/schedule/{schedule}','App\Http\Controllers\ScheduleController@update');
    Route::delete('/schedule/{schedule}','App\Http\Controllers\ScheduleController@destroy');
    
    Route::get('/students/user_id/{user_id}',[StudentController::class,'getStudentByUserId']);//Obtener estudiante por user_id
    Route::get('/students',[StudentController::class,'index']);//Todas los estudiantes
    Route::get('/students/{student}',[StudentController::class,'show']);//Obtener estudiante
    Route::apiResource('students', StudentController::class)->except(['index', 'show']);

    Route::get('/clases/teacher/{teacher_id}',[ClaseController::class,'getStudentsByTeacher']);//Obtener estudiante de un profesor
    Route::get('/clases/student/{student_id}',[ClaseController::class,'getTeachersByStudent']);//Obtener los profesores de un estudiante
    Route::put('/clases/changeState/{clase}',[ClaseController::class,'updateClaseState']);//Actualizar un estado
    Route::get('/clases',[ClaseController::class,'index']);//Todas las clases
    Route::get('/clases/{clase}',[ClaseController::class,'show']);//Obtener una clase
    Route::apiResource('clases', ClaseController::class)->except(['index', 'show']);
    Route::post('/subscription',[PaymentController::class,'getSubscriptionLink']);//Obtener link de Mercado Pago para pagar subscripción
});

Route::get('/payments',[PaymentController::class,'index']);//Todas los pagos
Route::get('/payments/{payment}',[PaymentController::class,'show']);//Obtener un pago
Route::apiResource('payments', PaymentController::class)->except(['index', 'show']);
