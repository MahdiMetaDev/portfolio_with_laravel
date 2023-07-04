<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_role_user_relation()
    {
        $role = Role::find(1);
        $user = User::find(11);

        DB::table('role_user')->insert([
            'user_id' => 11,
            'role_id' => $role->id,
        ]);

        $this->assertTrue(true);
    }
}
