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
    public function index(): JsonResponse
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
        try {
            $user = $this->userService->store($request->validated());
        } catch (\Exception $exception) {
            return $this->sendError('Validation Error', $exception);
        }

        return $this->sendResponse(
            UserResource::make($user),
            'User Created Successfully!',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User Not Found!!');
        }

        $data = $this->userService->show($user);

        return $this->sendResponse($data, 'User Retrieved Successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $this->userService->update($user, $request->validated());
        } catch (\Exception $error) {
            return $this->sendError('Validation Error!', $error);
        }

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
}
