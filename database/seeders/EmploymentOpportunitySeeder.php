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
        EmploymentOpportunity::create([
            'name' => 'Restaurant-Mitarbeiter:in',
            'vacancies' => 100,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Schichtführer:in',
            'vacancies' => 50,
        ]);

        EmploymentOpportunity::create([
            'name' => 'Lieferfahrer:in & Restaurant-Mitarbeiter:in',
            'vacancies' => 150,
        ]);
    }
}
