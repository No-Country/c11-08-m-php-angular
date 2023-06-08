<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{

    private AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request)
    {
        try {
            return $this->service->register($request->all());
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()],500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            return $this->service->login($request);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()],500);
        }
    }

    public function logout()
    {
        try {
            return $this->service->logout();
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()],500);
        }
    }

    public function changePassword(ChangePasswordRequest $request){
        try {
            return $this->service->changePassword($request->all());
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()],500);
        }
    }
}
