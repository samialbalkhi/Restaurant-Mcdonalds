<?php
namespace App\Service\RestaurantOwner;

class ShowNumberOfOrderService
{
    public function totalNumberoOfOrder()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->orders->count();
    }
    public function totalNumberoOfOrderStatusTrue()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->ordersWithStatusTrue->count();
    }
}
