<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Factory::create();
        $dataToInsert = [];
        
        for ($i = 0; $i < 50; $i++) {
        
            $dataToInsert[] = [
                'name' => $faker->city,
                'code' => $faker->postcode,
                'status' => $faker->boolean(), // Assign 'status' only once
            ];
        }
        
        City::insert($dataToInsert);
    }
}

