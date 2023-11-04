<?php
namespace App\Service\Backend;

use App\Models\Order;

class ViewOrderService
{
    public function index()
    {
        return Order::with('restaurantBranche:id,name')->paginate();
    }
    public function numberOfOrder(Order $order)
    {
        return $order->count();
    }
    public function paidOrder()
    {
        return Order::Active()->paginate();
    }

}
