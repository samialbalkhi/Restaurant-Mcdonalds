<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Job_offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $JobIDs = Job::pluck('id')->toArray(); // Convert the collection to an array

        for ($i = 1; $i <= 500; $i++) {
            $randomJobID = $JobIDs[array_rand($JobIDs)]; // Select a random job ID from the array
            $Job_offer[] = [
                'location' => 'Koblenzer Str. 160, 56727 Mayen',
                'franchisee' => 'in HuFro Restaurations GmbH',
                'description' => 'Work at the No. 1 system catering company. Standard wage with surcharges for public holidays and night shifts as well as vacation and Christmas bonuses. Around the corner from you, with flexible times and colorful teams.',
                'title' => 'Treat yourself to a safe, exciting and varied job. Prepare orders in the kitchen and serve guests in the restaurant or at the McDrive®.',
                'image' => 'Testimonials-Domenico.webp',
                'job_id' => $randomJobID, // Insert a single job ID
            ];
        }
        
        $chunks = array_chunk($Job_offer, 50);
        foreach ($chunks as $chunk) {
            Job_offer::insert($chunk);
        }
    }
}
