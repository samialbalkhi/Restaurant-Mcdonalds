<?php

namespace App\Http\Controllers\Frontend\VerifyCity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VerifyCityRequest;
use App\Service\Frontend\VerifyCity\VerifyCityService;

class VerifyCityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(VerifyCityRequest $request, VerifyCityService $verifyCityService)
    {
        return response()->json($verifyCityService->VerifyCity($request));
    }
}
