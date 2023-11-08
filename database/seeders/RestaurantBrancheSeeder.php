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
        $city = City::pluck('id')->toArray();
        $addedcity = [];
        $restaurantBranche = [];

        for ($i = 1; $i <= 500; $i++) {
            $cityId = $city[array_rand($city)];
            if (!in_array($cityId, $addedcity)) {
                $restaurantBranche[] = [
                    'name' => $faker->unique()->userName(),
                    'deliveryprice' => $faker->numberBetween(5.99, 10),
                    'city_id' => $cityId,
                    'image' => 'Burger.jpeg',
                    'arrivaltime' => rand(20, 30), // Adjusted arrival time range
                    'status' => rand(0, 1), // Generates random 0 or 1 for status
                ];
                $addedcity[] = $cityId;
            }
        }

        $chunks = array_chunk($restaurantBranche, 50);
        foreach ($chunks as $chunk) {
            RestaurantBranche::insert($chunk);
        }
    }
}
