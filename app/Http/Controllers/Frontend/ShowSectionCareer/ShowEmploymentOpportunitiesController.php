<?php

namespace App\Http\Controllers\Frontend\ShowSectionCareer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowSectionCareer\ShowEmploymentOpportunitiesService;
use App\Models\Joboffer;

class ShowEmploymentOpportunitiesController extends Controller
{
    private $ShowEmploymentOpportunitiesService ;
    public function __construct(ShowEmploymentOpportunitiesService $ShowEmploymentOpportunitiesService)
    {
        $this->ShowEmploymentOpportunitiesService = $ShowEmploymentOpportunitiesService;
    }
    public function ShowEmploymentOpportunities()
    {
        return response()->json(
            $this->ShowEmploymentOpportunitiesService->ShowEmploymentOpportunities()
        );
    }
    
    public function ShowJobOffer(Joboffer $jobOffer)
    {
        return response()->json(
            $this->ShowEmploymentOpportunitiesService->ShowJobOffer($jobOffer)
        );
    }

    public function ViewOneJobOffer(Joboffer $jobOffer){
        return response()->json(
            $this->ShowEmploymentOpportunitiesService->ViewOneJobOffer($jobOffer)
        );
    }
}
