<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create([
            'title' => 'Become part of our team.',
            'description' => 'McDonalds stands for diversity that is as colorful as peoples lives themselves. Thats why diversity, inclusion and integration are part of everyday life for us. Employees from over 100 nations work together in our restaurants. You fit in perfectly, dont you?',
            'image' => 'StartseitenTeaser.webp',
            'section_id' => 6,
        ]);
    }
}
