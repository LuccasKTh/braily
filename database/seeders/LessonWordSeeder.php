<?php

namespace Database\Seeders;

use App\Models\LessonWord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LessonWord::factory(500)->create();
    }
}
