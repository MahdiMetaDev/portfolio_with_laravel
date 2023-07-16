<?php

namespace Database\Seeders;

use App\Enums\PermissionEnums;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::factory(2)->create();
    }
}
