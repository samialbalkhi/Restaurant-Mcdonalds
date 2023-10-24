<?php
namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\EmploymentOpportunity;
use App\Models\Joboffer;

class ShowEmploymentOpportunitiesService
{
    public function ShowEmploymentOpportunities()
    {
        return EmploymentOpportunity::get();
    }
    public function ShowJobOffer(Joboffer $jobOffer)
    {
        return Joboffer::with('employment_opportunitie:id,name', 'jobOfferTimes')
            ->where('employment_opportunity_id', $jobOffer->id)
            ->select('id', 'location', 'employment_opportunity_id')
            ->paginate();
    }

    public function ViewOneJobOffer(Joboffer $jobOffer)
    {
        return Joboffer::with('employment_opportunitie:id,name', 'jobOfferTimes', 'details')
            ->where('id', $jobOffer->id)
            ->first();
    }
}
