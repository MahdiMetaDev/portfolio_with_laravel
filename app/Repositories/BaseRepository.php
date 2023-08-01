<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () use ($payload){
            return $this->model->create($payload);
        });
    }

    public function update($eloquent, array $payload = []): Model
    {
        DB::beginTransaction();
        try {
            $eloquent->update($payload);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }

        return $eloquent;
    }

    public function delete($eloquent): bool
    {
        return $eloquent->delete();
    }
}
