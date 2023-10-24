<?php

namespace Database\Seeders;

use App\Models\JobOfferTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Joboffer;

class JobOfferTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $JobOfferTime = Joboffer::pluck('id')->toArray();
        $values = ['Mini job', 'Part time', 'fulltime'];
        
        foreach ($JobOfferTime as $JobOfferTimeID) {
            // Initialize an array to keep track of used times for this job offer
            $usedTimes = [];
        
            for ($i = 1; $i <= 3; $i++) {
                // Randomly select a value from $values until you find one not used
                do {
                    $randomValue = $values[array_rand($values)];
                } while (in_array($randomValue, $usedTimes));
        
                // Add the selected time to the usedTimes array
                $usedTimes[] = $randomValue;
        
                $WorkTime[] = [
                    'name' => $randomValue,
                    'joboffer_id' => $JobOfferTimeID,
                ];
            }
        }
        
        // Use create without wrapping $WorkTime in an extra array
        JobOfferTime::insert($WorkTime);
    }
}
