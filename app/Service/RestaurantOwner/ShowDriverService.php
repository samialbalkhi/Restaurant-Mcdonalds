<?php
namespace App\Service\RestaurantOwner;

class ShowDriverService
{
    public function show()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->drivers;
    }
}
