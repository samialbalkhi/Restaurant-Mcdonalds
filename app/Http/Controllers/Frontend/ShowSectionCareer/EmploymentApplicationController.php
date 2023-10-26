<?php

namespace App\Http\Controllers\Frontend\ShowSectionCareer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EmploymentApplicationRequest;
use App\Service\Frontend\ShowSectionCareer\employmentApplicationsService;

class EmploymentApplicationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EmploymentApplicationRequest $request,employmentApplicationsService $employmentApplicationsService )
    {
        return response()->json(
            $employmentApplicationsService->store($request));
    }
}
