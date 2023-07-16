<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'city_id' => City::factory(),
            'street' => 'Babanazar 74',
            'zip_code' => '999'
        ];
    }
}
