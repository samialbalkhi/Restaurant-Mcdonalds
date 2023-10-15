<?php

namespace Database\Seeders;

use App\Models\Job_offer;
use Illuminate\Database\Seeder;
use App\Models\EmploymentOpportunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $JobIDs = EmploymentOpportunity::pluck('id')->toArray(); // Convert the collection to an array

        for ($i = 1; $i <= 500; $i++) {
            $randomJobID = $JobIDs[array_rand($JobIDs)]; // Select a random job ID from the array
            $Job_offer[] = [
                'location' => 'Koblenzer Str. 160, 56727 Mayen',
                'franchisee' => 'in HuFro Restaurations GmbH',
                'description' => 'Treat yourself to a safe, exciting and varied job. Prepare orders in the kitchen and serve guests in the restaurant or at the McDrive®.',
                'image' => 'Testimonials-Domenico.webp',
                'employment_opportunity_id' => $randomJobID, // Insert a single job ID
            ];
        }

        $chunks = array_chunk($Job_offer, 50);
        foreach ($chunks as $chunk) {
            Job_offer::insert($chunk);
        }
    }
}
