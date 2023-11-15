<?php
namespace App\Service\RestaurantOwner;

class ShowOrderService
{
    public function allOrders()
    {
        $owner = auth('restaurantOwner')->user();
        return $owner->restaurantBranche->orders()->paginate();
    }

    public function orderStatusTrue()
    {
        $owner = auth('restaurantOwner')->user();
        return $owner->restaurantBranche->ordersWithStatusTrue()->paginate();
    }
    public function showOneOrder($id)
    {
        $owner = auth('restaurantOwner')->user();

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
