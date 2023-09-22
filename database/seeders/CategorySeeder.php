<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        Category::create([
            'name' => 'Highlights',
            'image' => 'Highlights.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);
        Category::create([
            'name' => 'McSmart Menü.jpeg',
            'image' => 'McSmart Menü.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);
        Category::create([
            'name' => 'Burger',
            'image' => 'Burger.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);
        Category::create([
            'name' => 'McNuggets® & Fingerfood',
            'image' => 'McNuggets® & Fingerfood.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'McPlant',
            'image' => 'McPlant.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'Happy Meal',
            'image' => 'Happy Meal.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'Beilagen & Extras',
            'image' => 'Beilagen & Extras.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'Frühstück',
            'image' => 'Frühstück.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'Getränke',
            'image' => 'Getränke.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);

        Category::create([
            'name' => 'Desserts',
            'image' => 'Desserts.jpeg',
            'status' => 1,
            'section_id' => rand(0, 5),
        ]);

        Category::create([
            'name' => 'McCafé',
            'image' => 'McCafé.jpeg',
            'status' => rand(0, 1),
            'section_id' => 1,
        ]);
    }
}
