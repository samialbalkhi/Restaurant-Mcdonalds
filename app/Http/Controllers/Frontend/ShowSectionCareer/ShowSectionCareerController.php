<?php

namespace App\Http\Controllers\Frontend\ShowSectionCareer;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowSectionCareer\ShowSectionCareerService;

class ShowSectionCareerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowSectionCareerService $ShowSectionCareerService,Section $section)
    {
        return response()->json(
            $ShowSectionCareerService->ShowSectionCareer($section)
        );
    }
}
