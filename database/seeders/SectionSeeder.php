<?php

namespace Database\Seeders;

use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Seeder;

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
            'status' => 1,
        ]);

        Section::create([
            'name' => 'McCafe',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => 1,
        ]);

        Section::create([
            'name' => 'Familien',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => 1,
        ]);

        Section::create([
            'name' => 'Our responsibility',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => 1,
        ]);

        Section::create([
            'name' => ' MyMcDonalds',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'cafe.jpg',
            'status' => 1,
        ]);

        Section::create([
            'name' => ' Career',
            'description' => $faker->paragraph,
            'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
            'image' => 'StartseitenTeaser1.webp',
            'status' => 1,
        ]);

        Section::create([
            'name' => ' Delivery Service',
            'description' => $faker->paragraph,
            'message' => 'Spannende Bücher aus 40 % recyceltem Verpackungsmaterial in jedem Happy Meal®.',
            'image' => 'StartseitenTeaser1.webp',
            'status' => 1,
        ]);
    }
}
