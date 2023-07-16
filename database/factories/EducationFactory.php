<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EducationFactory extends Factory
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
            'university' => 'Ferdowsi',
            'enter_year' => 1995,
            'exit_year' => 2000,
            'GPA' => fake()->randomNumber(2),
            'field' => 'SoftWare Engineer',
            'grade' => 'Master',
            'job' => fake()->jobTitle
        ];
    }
}
