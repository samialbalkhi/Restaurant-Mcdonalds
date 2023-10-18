<?php
namespace App\Service\Backend;

use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;

class EmploymentOpportunityService
{
    public function index()
    {
        return 
            EmploymentOpportunity::all();
    }

    public function store(EmploymentOpportunityRequest $request)
    {
        $employmentOpportunity = EmploymentOpportunity::create($request->validated());

        return $employmentOpportunity;
    }

    public function edit(EmploymentOpportunity $employmentOpportunities)
    {
        return 
            $employmentOpportunities->find($employmentOpportunities->id);
    }

    public function update(EmploymentOpportunityRequest $request, EmploymentOpportunity $employmentOpportunities)
    {
        $employmentOpportunities->update($request->validated());

        return response()->json(['message' => 'Updateed successfully']);
    }

    public function destroy(EmploymentOpportunity $employmentOpportunities)
    {
        $employmentOpportunities->delete();

    }
}
