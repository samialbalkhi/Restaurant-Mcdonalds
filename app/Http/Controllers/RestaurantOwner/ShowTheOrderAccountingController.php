<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowTheOrderAccountingService;

class ShowTheOrderAccountingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowTheOrderAccountingService $showTheOrderAccountingService, $orderId)
    {
        return response()->json(
            $showTheOrderAccountingService->show($orderId));
    }
}
