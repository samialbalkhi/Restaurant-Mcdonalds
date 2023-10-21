<?php
namespace App\Service\Backend;

use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;

class EmploymentOpportunityService
{
    public function index()
    {
        return EmploymentOpportunity::all();
    }

    public function store(EmploymentOpportunityRequest $request)
    {
        $employmentOpportunity = EmploymentOpportunity::create([
            'name' => $request->name,
            'vacancies' => $request->vacancies,
        ]);

        $EmploymentOpportunityId = EmploymentOpportunity::find($employmentOpportunity->id);
        $worktimes = []; 

        for ($i = 0; $i < count($request->listOfworktime); $i++) {
            $worktime = $EmploymentOpportunityId->worktimes()->create([
                'name' => $request->listOfworktime[$i]['worktime'],
            ]);

            $worktimes[] = $worktime; 
        }

        // Move the return statement outside of the loop
        return ['employmentOpportunity' => $employmentOpportunity, 'worktime' => $worktimes];
    }
    public function edit(EmploymentOpportunity $employmentOpportunities)
    {
        return $employmentOpportunities->find($employmentOpportunities->id);
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
