<?php
namespace App\Service\RestaurantOwner;

class ShowDriverService
{
    public function show()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->drivers;
    }
}
