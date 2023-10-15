<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmploymentOpportunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmploymentOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Full time', 'Part time', 'Mini job'];
        $randomValue = $values[array_rand($values)];
        EmploymentOpportunity::create([
            'name' => 'Restaurant-Mitarbeiter:in',
            'Worktime' => $randomValue,
            'vacancies' => 100,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Schichtführer:in',
            'Worktime' => $randomValue,
            'vacancies' => 50,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Lieferfahrer:in & Restaurant-Mitarbeiter:in',
            'Worktime' => $randomValue,
            'vacancies' => 150,
        ]);
    }
}
