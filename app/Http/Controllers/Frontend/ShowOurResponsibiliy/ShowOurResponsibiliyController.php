<?php

namespace App\Http\Controllers\Frontend\ShowOurResponsibiliy;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowOurResponsibiliy\ShowOurResponsibiliyService;

class ShowOurResponsibiliyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowOurResponsibiliyService $showOurResponsibiliyService ,Section $section)
    {
        return response()->json(
            $showOurResponsibiliyService->ShowOurResponsibiliy($section)
        );
    }
}
