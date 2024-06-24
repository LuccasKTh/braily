<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\UserRole;
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
            'user_role_id' => fake()->randomElement(UserRole::pluck('id')),
            'email_verified_at' => now(),
            'password' => 12345678,
            'remember_token' => Str::random(10),
        ]);
        
        User::factory(11)->create();
    }
}
