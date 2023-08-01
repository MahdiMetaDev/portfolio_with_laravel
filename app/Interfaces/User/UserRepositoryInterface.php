<?php

namespace App\Interfaces\User;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function search(string $search): Collection;
}
