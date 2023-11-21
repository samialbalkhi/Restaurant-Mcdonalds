<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            OrderItem::create([
                'product_id' => Product::inRandomOrder()->first()->id, // Replace with actual product ID range
                'order_id' => Order::inRandomOrder()->first()->id, // Replace with actual order ID range
                'quantity' => $faker->numberBetween(1, 10),
                'price' => $faker->randomFloat(2, 10, 100), // Adjust the price range as needed
            ]);
        }
    }
}
