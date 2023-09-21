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
                'name' => 'foods',
                'description'=>$faker->paragraph,
                'message' => 'Gutscheine gültig vom 04.09. – 29.09.2023. In allen teilnehmenden Restaurants. In Frühstücksrestaurants ab 10 Uhr (samstags, sonn- und feiertags ab 11 Uhr). ',
                'image'=>'pizza.jpeg'
            ]);

            Category::create([
                'name' => 'McCafe',
                'description'=>$faker->paragraph,
                'message' => 'In allen teilnehmenden Restaurants. Solange der Vorrat reicht. Iced Coffee Shake täglich ab 10 Uhr erhältlich (samstags, sonn- und feiertags ab 11 Uhr).',
                'image'=>'cafe.jpg'
            ]);


        }

    }

