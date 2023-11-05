<?php
namespace App\Service\RestaurantOwner;

class ShowTheOrderAccountingService
{
    public function show($orderId)
    {
        $owner = auth()->user();

        $order = $owner->restaurantBranche->orders()->find($orderId);

        return $order->accounting;
    }
}