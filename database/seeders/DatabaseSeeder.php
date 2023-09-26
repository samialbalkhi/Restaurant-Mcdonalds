<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MyCafeSeeder;
use Database\Seeders\EntrustSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SectionSeeder::class);
        $this->call(EntrustSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MyCafeSeeder::class);
    }
}
