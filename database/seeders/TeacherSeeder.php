<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::factory()->create([
            'name' => 'Lucas Kelim Thiel',
            'email' => 'lucas.kthiel@gmail.com',
            "skill_id" => fake()->randomElement(Skill::pluck('id')),
            'email_verified_at' => now(),
            'password' => 12345678,
            'remember_token' => Str::random(10),
        ]);
        
        Teacher::factory(10)->create();
    }
}
