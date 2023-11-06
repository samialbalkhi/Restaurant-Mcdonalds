<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\ShowAccountingService;

class ShowAccountingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowAccountingService $showAccountingService)
    {
        return response()->json($showAccountingService->index());
    }
}
