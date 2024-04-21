<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = Skill::factory()->make()->toArray();

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
