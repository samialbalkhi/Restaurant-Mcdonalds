<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\DeliverySection\ShowAllCategoryService;

class ShowAllCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowAllCategoryService $ShowAllCategoryService)
    {
        return response()->json($ShowAllCategoryService->index());
    }
}
