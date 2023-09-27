<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Family::create([
            'name' => 'McDonald’s für Familien',
            'title' => 'Herzlich willkommen im McDonald’s Family-Bereich.
            Hier sind Spiel, Spaß und ganz viele Überraschungen für Groß und Klein garantiert.',
            'description' => 'Eine abwechslungsreiche Produktauswahl, tolle Spielzeuge oder auch spannende Bücher als Alternative sorgen für jede Menge Spaß im Happy Meal®!',
            'image' => 'Family.jpg',
            'section_id' => 3 ,
        ]);
    }
}
