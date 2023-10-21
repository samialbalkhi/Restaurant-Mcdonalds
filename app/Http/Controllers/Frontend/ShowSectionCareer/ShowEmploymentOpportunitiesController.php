<?php

namespace App\Http\Controllers\Frontend\ShowSectionCareer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowSectionCareer\ShowEmploymentOpportunitiesService;

class ShowEmploymentOpportunitiesController extends Controller
{
    public function ShowEmploymentOpportunities(ShowEmploymentOpportunitiesService $showEmploymentOpportunities)
    {
        return response()->json(
            $showEmploymentOpportunities->ShowEmploymentOpportunities()
        );
    }
}
