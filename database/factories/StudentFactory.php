<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create(['user_type' => 'student']);
        return [
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'age' => $this->faker->numberBetween(6, 18),
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'score' => $this->faker->numberBetween(0, 100),
            'image' => $this->faker->optional()->imageUrl(),
            'class_id' => Classes::inRandomOrder()->first()->id ?? Classes::factory(),
        ];
    }
}