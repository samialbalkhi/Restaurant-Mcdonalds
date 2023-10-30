<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\RestaurantBranche;

class ShowRestaurantBrancheService
{
    public function index(RestaurantBranche $restaurantBranche)
    {
        return RestaurantBranche::where('city_id', $restaurantBranche->id)->get();
    }
}
