<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostFactory::new()->count(25)->create();
    }
}
