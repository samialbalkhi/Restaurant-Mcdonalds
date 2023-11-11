<?php
namespace App\Service\RestaurantOwner;

class ShowNumberOfOrderService
{
    public function totalNumberoOfOrder()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->orders->count();
    }
    public function totalNumberoOfOrderStatusTrue()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->ordersWithStatusTrue->count();
    }
}
