<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\RestaurantBranche;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 1000; $i++) {
            $products[] = [
                'name' => $faker->sentence(2, true),
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(5, 200),
                'category_id' => Category::inRandomOrder()->first()->id,
                'featured' => rand(0, 1),
                'kcal' => $faker->numberBetween(150, 1000),
                'image' => 'Burger.jpeg',
                'status' => true,
                'created_at' => now(),
                'restaurant_branche_id'=>RestaurantBranche::inRandomOrder()->first()->id,
            ];
        }
        $chunks = array_chunk($products, 100);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }
    }
}
