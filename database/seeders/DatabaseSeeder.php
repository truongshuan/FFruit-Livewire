<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Permutations;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            TopicSeeder::class,
            PostSeeder::class,
            OrderSeeder::class,
            PermissionTableSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
