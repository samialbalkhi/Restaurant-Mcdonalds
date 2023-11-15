<?php
namespace App\Service\Frontend\ShowOurRestaurant;

use App\Models\Section;

class ShowOurRestaurantService
{
    public function ShowOurRestaurant(Section $section)
    {
        return Section::with('ourrestaurants')
            ->where('id', $section->id)
            ->get();
    }
}
