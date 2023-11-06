<?php
namespace App\Service\Backend;

use App\Models\Order;

class ViewOrderService
{
    public function index()
    {
        return Order::with('restaurantBranche:id,name', 'orderItems:id,quantity,price,order_id')->paginate();
    }
    public function numberOfOrder(Order $order)
    {
        return $order->count();
    }
    public function paidOrder()
    {
        return Order::with('restaurantBranche:id,name', 'orderItems:id,quantity,price,order_id')
            ->Active()
            ->paginate();
    }
}
