<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Detail;
use App\Models\Job_offer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $joboffer = Job_offer::pluck('id')->toArray();
        $faker = Factory::create();
        for ($i = 1; $i <= 500; $i++) {
            $randomJobID = $joboffer[array_rand($joboffer)];
            $Detail[] = [
                'details' => $faker->paragraph,
                'job_offer_id' => $randomJobID,
            ];
        }

        $chunks = array_chunk($Detail, 50);
        foreach ($chunks as $chunk) {
            Detail::insert($chunk);
        }
    }
}
