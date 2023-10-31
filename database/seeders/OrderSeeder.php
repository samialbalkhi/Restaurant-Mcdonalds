<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\RestaurantBranche;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $restaurantBranches = RestaurantBranche::pluck('id')->toArray();
        $addedRestaurantBranches = [];

        for ($i = 1; $i <= 500; $i++) {
            $restaurantBranchId = $restaurantBranches[array_rand($restaurantBranches)];

            if (!in_array($restaurantBranchId, $addedRestaurantBranches)) {
                $order[] = [
                    'description' => $faker->paragraph,
                    'total_amount' => $faker->numberBetween(5, 200),
                    'restaurant_branche_id' => $restaurantBranchId,
                    'quantity' => rand(1, 5),
                ];

                $addedRestaurantBranches[] = $restaurantBranchId;
            }
        }

        $chunks = array_chunk($order, 500);
        foreach ($chunks as $chunk) {
            Order::insert($chunk);
        }
    }
}
