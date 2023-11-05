<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowReviewService;

class ShowReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowReviewService $ShowReviewService)
    {
        return response()->json(
            $ShowReviewService->show());
    }
}
