<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowDriverService;

class ShowDriverController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowDriverService $showDriverService)
    {
        return response()->json(
            $showDriverService->show());
    }
}
