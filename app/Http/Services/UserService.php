<?php

namespace App\Http\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $repository,
        private readonly ImageService $imageService,
    )
    {
    }

    public function index(UserRequest $request)
    {
        return $this->repository->all($request->validated());
    }

    public function show(User $user): Model
    {
        return $this->repository->find($user->id);
    }

    public function store(array $payload = []): Model
    {
        $user = $this->repository->store($payload);

        $this->imageService->store($payload['image'], $user);

        return $user;
    }

    public function update($model, array $payload = []): Model
    {
        $user = $this->repository->update($model, $payload);

        $this->imageService->update($payload['image'], $user);

        return $user;
    }

    public function delete($model): bool
    {
        return $this->repository->delete($model);
    }
}
