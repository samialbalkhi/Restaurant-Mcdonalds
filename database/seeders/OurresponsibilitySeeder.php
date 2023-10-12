<?php

namespace Database\Seeders;

use App\Models\Ourresponsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurresponsibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ourresponsibility::create([
            'title' => 'Discover responsibility, taste quality.',
            'description' => 'Every person has many opportunities to make their world better. We as a company too. Find out here how we take responsibility!',
            'image' => 'Unsere-Verantwortung.jpg',
            'section_id' => 4,
        ]);

        Ourresponsibility::create([
            'title' => 'Discover responsibility, taste qualityasdasdasd.',
            'description' => 'Many small things can make a big difference. Well tell you which suppliers we work with, where our ingredients come from and how we ensure that the best quality is served every day in our restaurants.',
            'image' => 'Discover.jpg',
            'section_id' => 4,
        ]);

        Ourresponsibility::create([
            'title' => 'Qualität & Lieferkette',
            'description' => 'Doing the right thing – no big deal! But lots of small ones. Discover our most important figures from 2022 as well as our measures and goals for more sustainability here.',
            'image' => 'McD_Mockup.jpg',
            'section_id' => 4,
        ]);
    }
}
