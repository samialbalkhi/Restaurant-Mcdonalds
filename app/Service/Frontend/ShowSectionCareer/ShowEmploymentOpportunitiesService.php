<?php
namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\EmploymentOpportunity;

class ShowEmploymentOpportunitiesService
{
    public function ShowEmploymentOpportunities()
    {
       return EmploymentOpportunity::with('worktimes')->get();
    }
}
