<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(private readonly Model $model)
    {
    }

    public function query(array $payload = []): Builder
    {
        return $this->model->query();
    }

    public function all(array $payload = []): Collection
    {
        return $this->query($payload)->get();
    }

    public function paginate(array $payload = [], $limit = 15): LengthAwarePaginator
    {
        return $this->query($payload)->paginate($limit);
    }

    public function find(int $id, bool $exception = false): Model
    {
        if ($exception) {
            return $this->model->findOrFail($id);
        }
        return $this->model->find($id);
    }

    public function findByUuid(string $uuid, bool $exception = false): Model
    {
        if ($exception) {
            return $this->model->where('uuid', $uuid)->firstOrFail();
        }
        return $this->model->where('uuid', $uuid)->first();
    }

    public function store(array $payload = []): Model
    {
        return $this->model->create($payload);
    }

    public function update($eloquent, array $payload = []): Model
    {
        $eloquent->update($payload);

        return $eloquent;
    }

    public function delete($eloquent): bool
    {
        return $eloquent->delete();
    }
}
