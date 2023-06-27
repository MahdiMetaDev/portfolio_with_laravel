<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends ApiBaseController
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->store($request->validated());
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User Registered Successfully!');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User Login Successfully!');
        }
        else {
            return $this->sendError('Unauthorized', ['error' => 'Unauthorized']);
        }
    }
}
