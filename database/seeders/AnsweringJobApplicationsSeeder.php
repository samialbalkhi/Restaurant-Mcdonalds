<?php

namespace Database\Seeders;

use App\Models\Answering_job_application;
use App\Models\EmploymentApplication;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AnsweringJobApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            $AnsweringJob[] = [
                'name' => $faker->userName(),
                'description' => $faker->paragraph(),
                'message' => $faker->text(),
                'employment_application_id' => EmploymentApplication::inRandomOrder()->first()->id,
            ];
        }
        $chunks = array_chunk($AnsweringJob, 10);
        foreach ($chunks as $chunk) {
            Answering_job_application::insert($chunk);
        }
    }
}
