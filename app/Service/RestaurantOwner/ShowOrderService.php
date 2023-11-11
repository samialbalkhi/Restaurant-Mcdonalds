<?php
namespace App\Service\RestaurantOwner;

class ShowOrderService
{
    public function allOrders()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->orders;
    }

    public function orderStatusTrue()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->ordersWithStatusTrue;
    }
    public function showOneOrder($id)
    {
        $owner = auth('restaurantowner')->user();

        $order = $owner->restaurantBranche->orders()->find($id);

        return $order;
    }

    public function total_amount_all_orders()
    {
        $owner = auth('restaurantowner')->user();

        $totalAmount = $owner->restaurantBranche->ordersWithStatusTrue->sum('total_amount');
        return $totalAmount;
    }
}
