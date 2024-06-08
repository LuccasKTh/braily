<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Lucas Kelim Thiel',
            'email' => 'lucas.kthiel@gmail.com',
            "skill_id" => fake()->randomElement(Skill::pluck('id')),
            "userType_id" => 1,
            'email_verified_at' => now(),
            'password' => 12345678,
            'remember_token' => Str::random(10),
        ]);
        
        User::factory(10)->create();
    }
}
