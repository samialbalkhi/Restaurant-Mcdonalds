<?php
namespace App\Service\RestaurantOwner;

class ShowOrderService
{
    public function allOrders()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->orders;
    }

    public function orderStatusTrue()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->ordersWithStatusTrue;
    }
    public function showOneOrder($id)
    {
        $owner = auth()->user('restaurantowner');

        $order = $owner->restaurantBranche->orders()->find($id);

        return $order;
    }

    public function total_amount_all_orders()
    {
        $owner = auth()->user('restaurantowner');

        $totalAmount = $owner->restaurantBranche->ordersWithStatusTrue->sum('total_amount');
        return $totalAmount;
    }
}
