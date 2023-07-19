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

        $user->roles()->attach(3);

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

    #[NoReturn] public function test_roles_with_users_and_gender_count()
    {
        $roles = Role::query()
            ->withCount('users')
            ->withCount('female_users', 'male_users')
            ->get();

        dd($roles->toArray());
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
        $query = Product::query()
            ->withCount('likes as all_likes')
            ->withCount(['likes as likes_count_a_week_ago' => function (Builder $query) {
                $query->whereDate('created_at', '<=', Carbon::now())
                    ->whereDate('created_at', '>=', Carbon::now()->subDays(5));
            }])
            ->orderByDesc('likes_count_a_week_ago')
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
            ->withSum('orderItems', 'quantity')
            ->withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->limit(5)
            ->get();

        dd($query->toArray());

//        $this->assertTrue(true);
    }

    #[NoReturn] public function test_user_most_count_products()
    {
        $user = User::find(1);

        $query = Product::query()
            ->select('id as product_id', 'user_id as seller_id')
            ->withCount([
                'orderItems' => function ($query) use ($user) {
                    $query->select(DB::raw('SUM(quantity)'))
                        ->whereHas('order', function ($qq) use ($user) {
                            $qq->where('user_id', $user->id);
                        });
                }
            ])
            ->whereHas('orderItems', function ($q) use ($user) {
                $q->whereHas('order', function ($qq) use ($user) {
                    $qq->where('user_id', $user->id);
                });
            })
            ->orderByDesc('order_items_count')
            ->limit(4)
            ->get();

        dd($query->toArray());
    }

    #[NoReturn] public function test_collect_groupBy_map()
    {
        $data = collect([
            'product1' => ['category' => 'tech', 'product' => 'mouse', 'price' => 10],
            'product2' => ['category' => 'tech', 'product' => 'computer', 'price' => 20],
            'product3' => ['category' => 'tech', 'product' => 'mobile', 'price' => 30],
            'product4' => ['category' => 'clothes', 'product' => 'hat', 'price' => 30],
            'product5' => ['category' => 'clothes', 'product' => 'T-shirt', 'price' => 30],
        ])->groupBy('category', true);
//            ->map(function ($item) {
//                foreach ($item as $i) {
//                    $items[] = ['product' => $i['product'], 'price' => $i['price']];
//                }
//                return $items;
//            });

        dd($data->toArray());
    }

    #[NoReturn] public function test_groupBy_with_callback()
    {
        $data = collect([
            ['city' => 'TehranCity', 'name' => 'mahdi'],
            ['city' => 'Tehran-City', 'name' => 'ali'],
        ])->groupBy(function ($element) {
            return str_replace('-', '', $element['city']);
        });

        dd($data->toArray());
    }

    #[NoReturn] public function test_whereExists_clause()
    {
        $data = DB::table('users')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('orders')
                    ->whereRaw('orders.user_id = users.id');
            })
            ->get();

        dd($data->toArray());
    }


}
