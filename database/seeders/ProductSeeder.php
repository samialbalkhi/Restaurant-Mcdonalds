<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $categories = Category::pluck('id');
        $values = ['large', 'small', 'medium'];

        for ($i = 1; $i <= 1000; $i++) {
            $randomValue = $values[array_rand($values)];
            $products[] = [
                'name' => $faker->sentence(2, true),
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(5, 200),
                'quantity' => $faker->numberBetween(10, 200),
                'category_id' => $categories->random(),
                'featured' => rand(0, 1),
                'size' => $randomValue,
                'kcal' => $faker->numberBetween(150, 1000),
                'image' => 'Burger.jpeg',
                'status' => true,
                'created_at' => now(),
            ];
        }
        $chunks = array_chunk($products, 100);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }
    }
}
