<?php
namespace App\Service\RestaurantOwner;

class ShowOrderService
{
    public function allOrders()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->orders;
    }

    public function orderStatusTrue()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->ordersWithStatusTrue;
    }
    public function showOneOrder($id)
    {
        $owner = auth()->user();

        $order = $owner->restaurantBranche->orders()->find($id);

        return $order;
    }

    public function total_amount_all_orders()
    {
        $owner = auth()->user();

        $totalAmount = $owner->restaurantBranche->ordersWithStatusTrue->sum('total_amount');
        return $totalAmount;
    }
}
