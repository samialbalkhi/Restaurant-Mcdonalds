<?php
namespace App\Service\RestaurantOwner;

class ShowDriverService
{
    public function show()
    {
      $owner=  auth('restaurantOwner')->user();
        return $owner->restaurantBranche->drivers;
    }
}
