<?php

namespace App\Http\Controllers\RestaurantOwner;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowItemsOrderService;

class ShowItemsOrderController extends Controller
{
    public function __construct(private ShowItemsOrderService $showItemsOrderService)
    {
    }
    public function showItemsOrder($orderId)
    {
        return response()->json($this->showItemsOrderService->showItemsOrder($orderId));
    }

    public function showOneItemOrder(OrderItem $orderItem)
    {
        return response()->json($this->showItemsOrderService->showOneItemOrder($orderItem));
    }
}
