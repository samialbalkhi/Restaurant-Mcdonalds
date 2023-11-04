<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\ViewOrderService;

class ViewOrderController extends Controller
{
    public function __construct(private ViewOrderService $viewOrderService)
    {
    }

    public function index()
    {
        return response()->json(
            $this->viewOrderService->index());
    }

    public function numberOfOrder(Order $order)
    {
        return response()->json(
            $this->viewOrderService->numberOfOrder($order));
    }
    public function paidOrder()
    {
        return response()->json(
            $this->viewOrderService->paidOrder());
    }

}
