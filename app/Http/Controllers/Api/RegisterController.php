<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Mockery\Exception;

class RegisterController extends ApiBaseController
{
    public function register(UserRequest $request)
    {
        try {
            $payload = $request->validated();
        } catch (Exception $error) {
            return $this->sendError('Validation Error occurred!', $error);
        }


    }

    public function login(UserRequest $request)
    {

    }
}
