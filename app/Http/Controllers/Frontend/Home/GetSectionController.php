<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\Home\getSectionService;

class GetSectionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,getSectionService $HomePageService)
    {
        return response()->json(
            $HomePageService->getSection());
    }
   
}
