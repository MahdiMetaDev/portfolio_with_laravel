<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends ApiBaseController
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(UserRequest $request)
    {
        try {
            $payload = $request->validated();
        } catch (\Exception $error) {
            return $this->sendError('Validation Error occurred!', $error);
        }

        $user = $this->userService->store($payload);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User Registered Successfully!');
    }

    public function login(UserRequest $request)
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
