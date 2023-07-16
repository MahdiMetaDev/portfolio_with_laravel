<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ViewFactory extends Factory
{
    protected $model = View::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
