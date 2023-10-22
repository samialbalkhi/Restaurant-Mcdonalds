<?php
namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\EmploymentOpportunity;
use App\Models\Job_offer;

class ShowEmploymentOpportunitiesService
{
    public function ShowEmploymentOpportunities()
    {
        return EmploymentOpportunity::get();
    }
    public function ShowJobOffer(Job_offer $jobOffer)
    {
        return Job_offer::with('employment_opportunitie:id,name', 'jobOfferTimes')
            ->where('employment_opportunity_id', $jobOffer->id)
            ->select('id', 'location', 'employment_opportunity_id')
            ->paginate();
    }

    public function ViewOneJobOffer(Job_offer $jobOffer)
    {
        return Job_offer::with('employment_opportunitie:id,name', 'jobOfferTimes', 'details')
            ->where('id', $jobOffer->id)
            ->first();
    }
}
