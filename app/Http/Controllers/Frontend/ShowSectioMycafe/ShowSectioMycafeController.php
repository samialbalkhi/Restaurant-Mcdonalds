<?php

namespace App\Http\Controllers\Frontend\ShowSectioMycafe;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowMycafe\ShowMycafeService;

class ShowSectioMycafeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowMycafeService $ShowMycafeServic,Section $section)
    {
        return response()->json(
            $ShowMycafeServic->ShowSectioMycafe($section));
    }
}
