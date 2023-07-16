<?php

namespace Tests\Unit;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    #[NoReturn] public function test_user_has_permission(): void
    {
        $user = User::find(1);
        $permission_names = Permission::pluck('name')->toArray();

        dd($user->hasPermission($permission_names)->exists());

//        $this->assertTrue(true);
    }

    public function test_assign_role_to_user()
    {
        $user = User::find(1);

        $user->roles()->attach(2);

        $this->assertTrue(true);
    }

    public function test_assign_permission_to_role()
    {
        $user = User::find(1);
        $permission = Permission::find(2);
        $user_roles = $user->roles;

        foreach ($user_roles as $user_role) {
            $user_role->permissions()->attach($permission);
        }

        $this->assertTrue(true);
    }

    public function test_update_users_to_active()
    {
        DB::table('users')->where('active', true)
            ->chunkById(5, function (Collection $users) {
                foreach ($users as $user) {
                    DB::table('users')
                        ->where('id', $user->id)
                        ->update(['active' => false]);
                }
                dd('ok');
            });

        $this->assertTrue(true);
    }

    #[NoReturn] public function test_products_most_views()
    {
        $query = Product::withCount(['views'])
            ->orderByDesc('views_count')
            ->limit(7)
            ->get();

        dd($query->toArray());
    }

    #[NoReturn] public function test_products_most_likes()
    {
        $query = Product::withCount(['likes'])
            ->whereHas('likes', function (Builder $q) {
                $q->where([
                    ['created_at', '<=', Carbon::now()],
                    ['created_at', '>=', Carbon::now()->subDays(7)]
                ]);
            })
            ->orderByDesc('likes_count')
            ->limit(4)
            ->get();

        dd($query->toArray());
    }

    #[NoReturn] public function test_best_selling_products()
    {
        $query = Product::query()
            ->withCount([
                'orderItems as sell_price' => function ($query) {
                    $query->select(DB::raw('SUM(quantity*price)'));
                }
            ])
            ->withCount([
                'orderItems as order_items_product_count' => function ($q) {
                    $q->select(DB::raw('SUM(quantity)'));
                }
            ])
            ->withCount('orderItems')
            ->orderByDesc('sell_price')
            ->limit(5)
            ->get();

        dd($query->toArray());

//        $this->assertTrue(true);
    }

    #[NoReturn] public function test_user_most_count_products()
    {
        $user = User::find(2);

        $query = Product::query()
            ->select('id as product_id', 'user_id as seller_id')
            ->whereHas('orderItems', function ($q) use ($user) {
                $q->whereHas('order', function ($qq) use ($user) {
                    $qq->where('user_id', $user->id);
                });
            })
            ->withCount([
                'orderItems' => function ($query) {
                    $query->select(DB::raw('SUM(quantity)'));
                }
            ])
            ->orderByDesc('order_items_count')
            ->limit(4)
            ->get();

        dd($query->toArray());
    }
}
