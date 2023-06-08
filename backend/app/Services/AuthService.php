<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\TeacherRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Hash;

class AuthService
{

    public function register(array $request)
    {
        DB::beginTransaction();
        try {
            // $name['first_name'] = explode(" ", $request['name'])[0];
            // $name['last_name'] = explode(" ", $request['name'])[1];
            $user = User::create([
                'role' => $request['role'],
                // 'first_name' => $name['first_name'],
                // 'last_name' => $name['last_name'],
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);
            if($user->role == "Profesor"){
                $teacherService = new TeacherService(new TeacherRepository);
                $teacherService->createTeacherByRegister([
                    'user_id' => $user->id
                ]);
            }
            if($user->role == "Estudiante"){
                $studentService = new StudentService();
                $studentService->createStudentByRegister([
                    'user_id' => $user->id
                ]);
            }
            $token = $user->createToken('main')->plainTextToken;
            DB::commit();
            return [
                'user' => $user,
                'token' => $token
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public function login(LoginRequest $request)
    {
        try {
            if(Auth::attempt($request->all())){
                $user = Auth::user();
                $token = $user->createToken('main')->plainTextToken;
                return [
                    'user' => $user,
                    'token' => $token
                ];
            }
            return response()->json(['message' => 'Invalido email o password'], 422);
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user();
            $user->currentAccessToken()->delete();
            return [
                'message' => 'Logout exitoso',
                'success' => true
            ];
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function changePassword(array $request){
        try {
            $user = Auth::user();
            if(Hash::check($request['old_password'],$user->password)){
                $user->update([
                    'password'=> Hash::make($request['password'])
                ]);
                return response()->json([
                    'message' => 'Password successfully updated',
                ],200);
            }else{
                return response()->json([
                    'message' => 'Old password does not matched'
                ],400);
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}