<?php

namespace Database\Seeders;

use App\Models\TopicWord;
use Illuminate\Database\Seeder;

class TopicWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TopicWord::factory(500)->create();
    }
}
