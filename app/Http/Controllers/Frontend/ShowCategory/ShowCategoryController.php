<?php

namespace App\Http\Controllers\Frontend\ShowCategory;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowCategory\ShowCategoryService;

class ShowCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowCategoryService $ShowCategoryService,Category $category)
    {
        return response()->json(
            $ShowCategoryService->getCategory($category));
    }
}
