<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TopicWord;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SkillSeeder::class,
            EducationSeeder::class,
            TopicSeeder::class,
            TopicWordSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            LessonSeeder::class,
            LessonWordSeeder::class
        ]);
    }
}
