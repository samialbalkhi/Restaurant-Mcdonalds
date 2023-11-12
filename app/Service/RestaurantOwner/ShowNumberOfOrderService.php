<?php
namespace App\Service\RestaurantOwner;

class ShowNumberOfOrderService
{
    public function totalNumberoOfOrder()
    {
        $owner = auth('restaurantOwner-api')->user();
        return $owner->restaurantBranche->orders->count();
    }
    public function totalNumberoOfOrderStatusTrue()
    {
        $owner = auth('restaurantOwner-api')->user();
        return $owner->restaurantBranche->ordersWithStatusTrue->count();
    }
}
