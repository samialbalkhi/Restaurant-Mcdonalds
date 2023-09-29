<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Full time', 'Part time', 'Mini job'];
        $randomValue = $values[array_rand($values)];
        Job::create([
            'name' => 'Restaurant-Mitarbeiter:in',
            'Worktime' => $randomValue,
            'vacancies' => 100,
        ]);

        Job::create([
            'name' => 'Schichtführer:in',
            'Worktime' => $randomValue,
            'vacancies' => 50,
        ]);

        Job::create([
            'name' => 'Lieferfahrer:in & Restaurant-Mitarbeiter:in',
            'Worktime' => $randomValue,
            'vacancies' => 150,
        ]);
    }
}
