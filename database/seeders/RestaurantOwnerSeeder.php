<?php

namespace Database\Seeders;

use Faker\Factory;
use Nette\Utils\Random;
use App\Models\RestaurantOwner;
use Illuminate\Database\Seeder;
use App\Models\RestaurantBranche;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $restaurantBranches = RestaurantBranche::pluck('id'); // Shuffle the branches

        foreach ($restaurantBranches as $branch) {
                 RestaurantOwner::create([
                'name' => $faker->userName(),
                'phone' => $faker->unique()->phoneNumber(),
                'address' => $faker->address(),
                'note' => $faker->paragraph(),
                'email' => $faker->unique()->safeEmail,
                'password' => 'password',
                'restaurant_branche_id' => $branch,
            ]);
        }
    }
}
