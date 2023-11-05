<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowOrderService;

class ShowOrderController extends Controller
{
    public function __construct(private ShowOrderService $showOrderService)
    {
    }
    public function allOrders()
    {
        return response()->json($this->showOrderService->allOrders());
    }
    public function orderStatusTrue()
    {
        return response()->json($this->showOrderService->orderStatusTrue());
    }
    public function showOneOrder($id)
    {
        return response()->json($this->showOrderService->showOneOrder($id));
    }

    public function total_amount_all_orders()
    {
        return response()->json($this->showOrderService->total_amount_all_orders());
    }
}
