<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = UserType::factory()->make()->toArray();

        foreach ($types as $type) {
            UserType::create($type);
        }
    }
}
