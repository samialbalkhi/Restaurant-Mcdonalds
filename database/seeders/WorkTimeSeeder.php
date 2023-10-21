<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\WorkTime;
use Illuminate\Database\Seeder;
use App\Models\EmploymentOpportunity;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EmploymentOpportunity = EmploymentOpportunity::pluck('id')->toArray();

        $randomEmploymentOpportunityID = $EmploymentOpportunity[array_rand($EmploymentOpportunity)];
        $values = ['Mini job', 'Part time', 'fulltime'];
        $WorkTime = []; // Initialize the array outside the loop
        
        for ($i = 1; $i <= 3; $i++) {
            $randomValue = $values[array_rand($values)];
            $WorkTime[] = [
                'name' => $randomValue,
                'employment_opportunity_id' => $randomEmploymentOpportunityID,
            ];
        }
        
        // Use create without wrapping $WorkTime in an extra array
        // EmploymentOpportunity::create($WorkTime);
        WorkTime::insert($WorkTime);
        
    }
}
