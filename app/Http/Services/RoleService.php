<?php

namespace App\Http\Services;

use App\Http\Requests\RoleRequest;
use App\Interfaces\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public function __construct(private readonly RoleRepositoryInterface $repository)
    {
    }

    public function index(array $payload = [])
    {
        return $this->repository->all($payload);
    }

    public function show(Role $role): Model
    {
        return $this->repository->find($role->id);
    }

    public function store(array $payload = []): Model
    {
        DB::transaction(function () use ($payload) {
            return $this->repository->store($payload);
        });
    }

    public function update($model, array $payload = []): Model
    {
        DB::transaction(function () use ($model, $payload) {
            return $this->repository->update($model, $payload);
        });
    }

    public function delete($model): bool
    {
        DB::transaction(function () use ($model) {
            return $this->repository->delete($model);
        });
    }
}
