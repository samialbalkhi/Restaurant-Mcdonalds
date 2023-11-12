<?php
namespace App\Service\RestaurantOwner;

class ShowDriverService
{
    public function show()
    {
        $owner = auth('restaurantOwner-api')->user();
        return $owner->restaurantBranche->drivers;
    }
}
