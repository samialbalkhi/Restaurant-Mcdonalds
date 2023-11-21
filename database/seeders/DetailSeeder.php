<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Joboffer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 500; $i++) {
            $Detail[] = [
                'details' => $faker->paragraph,
                'joboffer_id' => Joboffer::inRandomOrder()->first()->id,
            ];
        }

        $chunks = array_chunk($Detail, 50);
        foreach ($chunks as $chunk) {
            Detail::insert($chunk);
        }
    }
}
