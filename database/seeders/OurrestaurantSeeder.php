<?php

namespace Database\Seeders;

use App\Models\Ourrestaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurrestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ourrestaurant::create([
            'title' => 'Welcome to MyMcDonald.',
            'description' => 'App works: Here you will find all the benefits you can enjoy with your McDonald’s app.',
            'image' => 'mymcdonalds.jpg',
            'section_id' => 5,
        ]);
    }
}
