<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Family::create([
            'name' => 'Junior Club',
            'description' => 'Eine abwechslungsreiche Produktauswahl, tolle Spielzeuge oder auch spannende Bücher als Alternative sorgen für jede Menge Spaß im Happy Meal®!',
            'image' => 'Family.jpg',
            'section_id' => 3,
        ]);

        Family::create([
            'name' => 'Kindergeburtstag',
            'description' => 'Eine abwechslungsreiche Produktauswahl, tolle Spielzeuge oder auch spannende Bücher als Alternative sorgen für jede Menge Spaß im Happy Meal®!',
            'image' => 'Family.jpg',
            'section_id' => 3,
        ]);

        Family::create([
            'name' => 'Happy Meal® Geschenke',
            'description' => 'Eine abwechslungsreiche Produktauswahl, tolle Spielzeuge oder auch spannende Bücher als Alternative sorgen für jede Menge Spaß im Happy Meal®!',
            'image' => 'Family.jpg',
            'section_id' => 3,
        ]);
    }
}
