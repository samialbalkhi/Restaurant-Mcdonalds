<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Employment_application;
use App\Models\Answering_job_application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnsweringJobApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $Employment_application = Employment_application::pluck('id');
        for ($i = 1; $i <= 100; $i++) {
            $AnsweringJob[] = [
                'name' => $faker->userName(),
                'description' => $faker->paragraph(),
                'message' => $faker->text(),
                'employment_application_id' => $Employment_application->random(),
            ];
        }
        $chunks = array_chunk($AnsweringJob, 10);
        foreach ($chunks as $chunk) {
            Answering_job_application::insert($chunk);
        }
    }
}
