<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Models\RestaurantBranche;
use App\Http\Controllers\Controller;
use App\Service\Frontend\DeliverySection\ShowRestaurantBrancheService;

class ShowRestaurantBrancheController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowRestaurantBrancheService $showRestaurantBrancheService,RestaurantBranche $restaurantBranche)
    {
        return response()->json($showRestaurantBrancheService->index($restaurantBranche));
    }
}
