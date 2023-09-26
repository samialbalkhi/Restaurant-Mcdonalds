<?php

namespace Database\Seeders;

use App\Models\MyCafe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyCafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MyCafe::create([
            'title_mycafe_drinks' => 'Summer highlights at McCafé®',
            'cold_drinks' => 'Discover the McCafé® Cold Drinks',
            'description_drinks_cold' => 'If the heat gets to your head, its high time for a delicious cool down in the McCafé®! Discover our refreshing cold drinks for hot days now. Our McCafé® range is as versatile as summer. Whether Iced Coffee Shake or Cold Brew - choose your heavenly delicious and ice-cold McCafé® favorite now.',
            'title_mycafe_sweets' => 'Discover our new McCafé® food highlights',
            'description_sweets' => 'Try the delicious McCafé® cake N.Y. Style Cheesecake with OREO® topping and chocolate sauce or our Cookie Dough Donut.',
            'image_drinks' => 'image_drinks.jpeg',
            'image_sweets' => 'image_sweets.jpg',
            'section_id' => 2,
        ]);
    }
}
