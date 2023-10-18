<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmploymentOpportunity;
use App\Service\Backend\EmploymentOpportunityService;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;

class EmploymentOpportunityController extends Controller
{
   private $EmploymentOpportunityService ;
   public function __construct(EmploymentOpportunityService $employmentOpportunityService)
   {
    $this->EmploymentOpportunityService = $employmentOpportunityService;
   }
    public function index()
    {
        return response()->json(
           $this->EmploymentOpportunityService->index());
    }

    public function store(EmploymentOpportunityRequest $request)
    {
        $employmentOpportunity=$this->EmploymentOpportunityService->store($request);
        return response()->json($employmentOpportunity, 201);
    }

    public function edit(EmploymentOpportunity $employmentOpportunities)
    {
        return response()->json(
            $this->EmploymentOpportunityService->edit($employmentOpportunities));
    }

    public function update(EmploymentOpportunityRequest $request, EmploymentOpportunity $employmentOpportunities)
    {
        $this->EmploymentOpportunityService->update($request, $employmentOpportunities);
        return response()->json(['message' => 'Updateed Category successfully']);
    }

    public function destroy(EmploymentOpportunity $employmentOpportunities)
    {
        $this->EmploymentOpportunityService->destroy($employmentOpportunities);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
