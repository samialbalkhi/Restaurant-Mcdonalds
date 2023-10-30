<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\City;
use Illuminate\Database\Seeder;
use App\Models\RestaurantBranche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantBrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $city = City::pluck('id');

        for ($i = 1; $i <= 500; $i++) {
            $restaurantBranche[] = [
                'name' => $faker->sentence(2, true),
                'deliveryprice' => $faker->numberBetween(5.99, 10),
                'city_id' => $city->random(),
                'image' => 'Burger.jpeg',
                'arrivaltime' => rand(30, 50, 60, 20),
                'status' => rand(true, false),
            ];
        }
        $chunks = array_chunk($restaurantBranche, 50);
        foreach ($chunks as $chunk) {
            RestaurantBranche::insert($chunk);
        }
    }
}
