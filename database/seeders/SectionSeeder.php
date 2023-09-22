<?php

namespace Database\Seeders;

use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        Section::create([
            'name' => 'Products',
            'description' => $faker->paragraph,
            'message' => 'Gutscheine gültig vom 04.09. – 29.09.2023. In allen teilnehmenden Restaurants. In Frühstücksrestaurants ab 10 Uhr (samstags, sonn- und feiertags ab 11 Uhr). ',
            'image' => 'pizza.jpeg',
            'status' => rand(0,1),
        ]);

        Section::create([
            'name' => 'McCafe',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => rand(0,1),

        ]);

        Section::create([
            'name' => 'Familien',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => rand(0,1),

        ]);

        Section::create([
            'name' => 'Unsere verantwortung',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => rand(0,1),

        ]);

        Section::create([
            'name' => ' MyMcDonalds',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => rand(0,1),

        ]);
    }
}
