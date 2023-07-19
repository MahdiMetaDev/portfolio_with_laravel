<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Education;
use App\Models\Like;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(
                Profile::factory(1)
                    ->has(
                        Address::factory(1)
                            ->has(
                                City::factory(1)
                                    ->has(Country::factory(1))
                            )
                    )
                    ->has(Education::factory(1))
            )
            ->hasImage(1)
            ->create()->each(function ($user) {
                Product::factory(10)
                    ->create([
                        'user_id' => $user->id,
                    ]);

                $order = Order::factory()->create(['user_id' => $user->id]);

                foreach (range(1, 2) as $item) {
                    OrderItem::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => Product::inRandomOrder()->first()->id
                    ]);
                }
            });

        foreach (User::where('active', true)->get() as $user) {
            foreach (Product::limit(30)->inRandomOrder()->get() as $product) {
                Like::factory()->create([
                    'user_id' => $user->id,
                    'likeable_id' => $product->id,
                    'likeable_type' => Product::class,
                    'created_at' => Carbon::now()->subDays(rand(1, 20))
                ]);
            }
        }

        foreach (User::where('active', true)->get() as $user) {
            foreach (Product::limit(30)->inRandomOrder()->get() as $product) {
                View::factory()->create([
                    'user_id' => $user->id,
                    'viewable_id' => $product->id,
                    'viewable_type' => Product::class,
                    'created_at' => Carbon::now()->subDays(rand(1, 20))
                ]);
            }
        }
    }
}
