<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
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
            'name' => "Lucas Kelim Thiel",
            'email' => "lucas.kthiel@gmail.com",
            'user_role_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('LucasKelim!17'),
            'remember_token' => Str::random(10)
        ]);

        User::factory()->create([
            'name' => "Kauan Felipe Scheidt",
            'email' => "kauan@gmail.com",
            'user_role_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('KauanFelipe'),
            'remember_token' => Str::random(10)
        ]);

        User::factory(10)->create();
    }
}
