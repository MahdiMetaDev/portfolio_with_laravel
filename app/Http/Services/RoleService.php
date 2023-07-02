<?php

namespace App\Http\Services;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RoleService extends BaseService
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
