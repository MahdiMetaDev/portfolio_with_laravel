<?php

namespace App\Http\Services;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }
}
