<?php
namespace App\Service\RestaurantOwner;

class ShowOrderService
{
    public function allOrders()
    {
        $owner = auth('restaurantOwner-api')->user();
        return $owner->restaurantBranche->orders;
    }

    public function orderStatusTrue()
    {
        $owner = auth('restaurantOwner-api')->user();
        return $owner->restaurantBranche->ordersWithStatusTrue;
    }
    public function showOneOrder($id)
    {
        $owner = auth('restaurantOwner-api')->user();

        $order = $owner->restaurantBranche->orders()->find($id);

        return $order;
    }

    public function total_amount_all_orders()
    {
        $owner = auth('restaurantOwner-api')->user();

        $totalAmount = $owner->restaurantBranche->ordersWithStatusTrue->sum('total_amount');
        return $totalAmount;
    }
}
