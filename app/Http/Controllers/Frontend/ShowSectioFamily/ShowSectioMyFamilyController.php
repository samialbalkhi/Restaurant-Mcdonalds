<?php

namespace App\Http\Controllers\Frontend\ShowSectioFamily;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Service\Frontend\ShowSectioMyFamily\ShowSectioMyFamilyService;

class ShowSectioMyFamilyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowSectioMyFamilyService $ShowSectioMyFamilyService,Section $section)
    {
        return response()->json(
            $ShowSectioMyFamilyService->ShowSectioMyFamily($section)
        );
    }
}
