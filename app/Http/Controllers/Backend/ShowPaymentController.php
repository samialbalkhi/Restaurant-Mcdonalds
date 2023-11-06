<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\ShowPaymentService;

class ShowPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowPaymentService $showPaymentService)
    {
        return response()->json($showPaymentService->showPayment());
    }
}
