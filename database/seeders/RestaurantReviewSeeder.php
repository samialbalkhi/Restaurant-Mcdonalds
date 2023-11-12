<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\RestaurantBranche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        RestaurantBranche::all()->each(function ($product) use ($faker) {
            $values = ['Service', 'Food'];

            for ($i = 1; $i < rand(1, 3); $i++) {
                $randomValue = $values[array_rand($values)];

                $product->restaurantReviews()->create([
                    'user_id' => rand(2, 22),
                    'comment' => $faker->paragraph,
                    'rating' => rand(1, 5),
                    'review_type' => $randomValue,
                    'title' => 'Eat & Delivery',
                    'status' => false,
                ]);
            }
        });
    }
}
