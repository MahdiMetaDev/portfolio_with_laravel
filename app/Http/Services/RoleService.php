<?php

namespace App\Http\Services;

use App\Http\Requests\RoleRequest;
use App\Interfaces\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RoleService
{
    public function __construct(private readonly RoleRepositoryInterface $repository)
    {
    }

    public function index(RoleRequest $request)
    {
        return $this->repository->all($request->validated());
    }

    public function show(Role $role): Model
    {
        return $this->repository->find($role->id);
    }

    public function store(array $payload = []): Model
    {
        return $this->repository->store($payload);
    }

    public function update($model, array $payload = []): Model
    {
        return $this->repository->update($model, $payload);
    }

    public function delete($model): bool
    {
        return $this->repository->delete($model);
    }
}
