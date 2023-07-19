<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    public function query(array $payload = []): Builder;

    public function all(array $payload = []): Collection;

    public function paginate(array $payload = [], $limit = 15): LengthAwarePaginator;

    public function store(array $payload = []): Model;

    public function update($eloquent, array $payload = []): Model;

    public function delete($eloquent): bool;

    public function find(int $id, bool $exception = false): Model;

    public function findByUuid(string $uuid, bool $exception = false): Model;
}
