<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ShowBranchService;

class ShowBranchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowBranchService $ShowBranchService)
    {
        return response()->json(
            $ShowBranchService->show());
    }   
}
