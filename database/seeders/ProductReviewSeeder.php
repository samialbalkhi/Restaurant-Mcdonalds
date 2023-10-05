<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        Product::all()->each(function ($product) use ($faker) {
            $values = ['Service', 'Food'];
        
            for ($i = 1; $i < rand(1, 3); $i++) {
                $randomValue = $values[array_rand($values)];
        
                $product->reviews()->create([
                    'user_id' => rand(2, 22),
                    'name' => $faker->userName,
                    'comment' => $faker->paragraph,
                    'rating' => rand(1, 5),
                    'review_type' => $randomValue,
                    'title' => 'Eat & Delivery',
                ]);
            }
        });
        
    }
}
