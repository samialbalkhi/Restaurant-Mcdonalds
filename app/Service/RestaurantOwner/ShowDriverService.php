<?php
namespace App\Service\RestaurantOwner;

class ShowDriverService
{
    public function show()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->drivers;
    }
}
