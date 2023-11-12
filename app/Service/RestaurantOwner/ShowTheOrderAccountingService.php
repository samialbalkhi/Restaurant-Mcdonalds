<?php
namespace App\Service\RestaurantOwner;

class ShowTheOrderAccountingService
{
    public function show($orderId)
    {
        $owner = auth('restaurantOwner-api')->user();
        
        $order = $owner->restaurantBranche->orders()->find($orderId);

        return $order->accounting;
    }
}
