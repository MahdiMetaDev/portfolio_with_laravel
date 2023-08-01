<?php

namespace App\Http\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $repository,
        private readonly ImageService            $imageService,
    )
    {
    }

    public function index(array $payload = [])
    {
        return $this->repository->all($payload);
    }

    public function show(User $user): Model
    {
        return $this->repository->find($user->id);
    }

    public function store(array $payload = []): Model
    {
        DB::transaction(function () use ($payload) {
            $user = $this->repository->store($payload);
            $this->imageService->store($payload['image'], $user);
            return $user;
        });
    }

    public function update($model, array $payload = []): Model
    {
        DB::transaction(function () use ($model, $payload) {
            $user = $this->repository->update($model, $payload);
            $this->imageService->update($payload['image'], $user);
            return $user;
        });
    }

    public function delete($model): bool
    {
        DB::transaction(function () use ($model) {
            return $this->repository->delete($model);
        });
    }

    public function search(string $search): Collection
    {
        return $this->repository->search($search);
    }
}
