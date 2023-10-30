<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\RestaurantBranche;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $restaurantBranches = RestaurantBranche::pluck('id')->toArray();
        $assignedDrivers = [];

        for ($i = 1; $i <= 500; $i++) {
            $restaurantBranchId = $restaurantBranches[array_rand($restaurantBranches)];

            // Check if the driver is not already assigned to a restaurant
            if (!in_array($restaurantBranchId, $assignedDrivers)) {
                $driver[] = [
                    'name' => $faker->sentence(2, true),
                    'phone' => $faker->phoneNumber(),
                    'email' => $faker->email(),
                    'address' => $faker->address(),
                    'restaurant_branche_id' => $restaurantBranchId,
                    'status' => rand(true, false),
                ];

                // Mark the driver as assigned to the restaurant
                $assignedDrivers[] = $restaurantBranchId;
            }
        }

        $chunks = array_chunk($driver, 50);
        foreach ($chunks as $chunk) {
            Driver::insert($chunk);
        }
    }
}
