<?php

namespace App\Http\Controllers\Frontend\ShowOurRestaurant;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowOurRestaurant\ShowOurRestaurantService;

class ShowOurRestaurantController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowOurRestaurantService $showOurRestaurantService,Section $section)
    {
        return response()->json(
            $showOurRestaurantService->ShowOurRestaurant($section)
        );
    }
}
