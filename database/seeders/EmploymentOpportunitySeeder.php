<?php

namespace Database\Seeders;

use App\Models\EmploymentOpportunity;
use Illuminate\Database\Seeder;

class EmploymentOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Full time', 'Part time', 'Mini job'];
        EmploymentOpportunity::create([
            'name' => 'Restaurant-Mitarbeiter:in',
            'Worktime' => $values[array_rand($values)],
            'vacancies' => 100,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Schichtführer:in',
            'Worktime' => $values[array_rand($values)],
            'vacancies' => 50,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Lieferfahrer:in & Restaurant-Mitarbeiter:in',
            'Worktime' => $values[array_rand($values)],
            'vacancies' => 150,
        ]);
    }
}
