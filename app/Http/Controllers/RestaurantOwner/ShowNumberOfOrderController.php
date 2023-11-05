<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowNumberOfOrderService;

class ShowNumberOfOrderController extends Controller
{
    public function __construct(private ShowNumberOfOrderService $showNumberOfOrderService)
    {
    }
    public function totalNumberoOfOrder()
    {
        return response()->json($this->showNumberOfOrderService->totalNumberoOfOrder());
    }

    public function totalNumberoOfOrderStatusTrue()
    {
        return response()->json($this->showNumberOfOrderService->totalNumberoOfOrderStatusTrue());
    }
}
