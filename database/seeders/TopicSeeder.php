<?php

namespace Database\Seeders;

use Database\Factories\TopicFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TopicFactory::new()->count(25)->create();
    }
}
