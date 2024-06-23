<?php

namespace Database\Factories;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Teacher;
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
        return [
            'name' => fake()->name(),
            'age' => fake()->dayOfMonth(),
            'enroll' => fake()->unique()->numberBetween(2022000000, 2024000000),
            'about' => fake()->text(),
            'teacher_id' => fake()->randomElement(Teacher::pluck('id')),
            'skill_id' => fake()->randomElement(Skill::pluck('id')),
            'education_id' => fake()->randomElement(Education::pluck('id'))
        ];
    }
}
