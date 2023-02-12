<?php

namespace Database\Factories;

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
    public function definition()
    {
        $gender = rand(0, 1);
        return [
            'first_name' => fake()->firstName($gender ? 'female' : 'male'),
            'middle_name' => fake()->middleName($gender ? 'female' : 'male'),
            'last_name' => fake()->lastName($gender ? 'female' : 'male'),
            'iin' => collect(array_fill(0, 11, ''))->map(fn($item) => rand(0, 9))->implode(''),
        ];
    }
}
