<?php

namespace Database\Seeders;

use App\Models\MyCafe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyCafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MyCafe::create([
            'name' => 'McCafé® Vielfalt',
            'description' => 'Discover the McCafé® Cold Drinks',
            'image' => 'image_drinks.jpeg',
            'section_id' => 2,
        ]);

        MyCafe::create([
            'name' => 'McCafé® Qualität',
            'description' => 'Discover the McCafé® Cold Drinks',
            'image' => 'image_drinks.jpeg',
            'section_id' => 2,
        ]);
    }
}
