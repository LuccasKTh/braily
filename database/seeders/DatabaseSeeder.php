<?php

namespace Database\Seeders;

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
            UserTypeSeeder::class,
            UserSeeder::class,
            TopicSeeder::class,
            TopicWordSeeder::class,
            StudentSeeder::class,
            LessonSeeder::class,
            LessonWordSeeder::class
        ]);
    }
}
