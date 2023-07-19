<?php

namespace App\Repositories\Role;

use App\Interfaces\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
