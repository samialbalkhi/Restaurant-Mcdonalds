<?php

namespace Database\Seeders;

use App\Models\EmploymentOpportunity;
use App\Models\Joboffer;
use Illuminate\Database\Seeder;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 500; $i++) {
            $Joboffer[] = [
                'location' => 'Koblenzer Str. 160, 56727 Mayen',
                'franchisee' => 'in HuFro Restaurations GmbH',
                'description' => 'Treat yourself to a safe, exciting and varied job. Prepare orders in the kitchen and serve guests in the restaurant or at the McDrive®.',
                'image' => 'Testimonials-Domenico.webp',
                'employment_opportunity_id' => EmploymentOpportunity::inRandomOrder()->first()->id,
            ];
        }

        $chunks = array_chunk($Joboffer, 50);
        foreach ($chunks as $chunk) {
            Joboffer::insert($chunk);
        }
    }
}
