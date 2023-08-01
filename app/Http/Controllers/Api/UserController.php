<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends ApiBaseController
{
    public function __construct(private readonly UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->index();

        return $this->sendResponse(
            UserResource::collection($users),
            'Users Retrieved Successfully!'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->validated());

        return $this->sendResponse(
            UserResource::make($user),
            'User Created Successfully!',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data = $this->userService->show($user);

        return $this->sendResponse($data, 'User Retrieved Successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($user, $request->validated());

        return $this->sendResponse(
            UserResource::make($user),
            'User Updated Successfully!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return $this->sendResponse(message: 'User Deleted Successfully!');
    }

    public function restore(User $user)
    {
        $user->restore();
        return 'user restored successfully!';
    }

    public function forceDelete(User $user)
    {
        $user->forceDelete();
        return 'user deleted permanently!';
    }
}
