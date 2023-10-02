<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Employment_application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmploymentApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Female', 'Male'];
        $faker = Factory::create();

        for ($i = 1; $i <= 500; $i++) {
            $randomValue = $values[array_rand($values)];

            $twoYearsAgo = new DateTime();
            $twoYearsAgo->modify('-2 years');
            $startDate = $twoYearsAgo->format('Y-m-d H:i:s');

            $forYearsAgo = new DateTime();
            $forYearsAgo->modify('-4 years');
            $expireDate = $twoYearsAgo->format('Y-m-d H:i:s');

            $employment_applications[] = [
                'gender' => $randomValue,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'city' => $faker->city,
                'birthday' => $faker->dateTimeThisYear(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email() . uniqid(),
                'title' => $faker->jobTitle(),
                'company_name' => $faker->company(),
                'office_location' => 'New York, NY, US',
                'description' => $faker->paragraph(),
                'start_date' => $startDate,
                'expire_date' => $expireDate,
                'i_currently_work_here' => rand(0, 1),
                'resume' => 'bitte-ausdrucken.pdf',
                'message' => 'The Messaging Company (TMC) is a privacy-first company. Your data is your data and it is securely stored in your region. You are a valued and respected customer, not our product.',
            ];
        }

        $chunks = array_chunk($employment_applications, 50);
        foreach ($chunks as $chunk) {
            Employment_application::insert($chunk);
        }
    }
}
