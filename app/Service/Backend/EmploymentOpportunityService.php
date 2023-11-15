<?php
namespace App\Service\Backend;

use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;

class employmentOpportunityService
{
    public function index()
    {
        return EmploymentOpportunity::all();
    }

    public function store(EmploymentOpportunityRequest $request): EmploymentOpportunity
    {
        return EmploymentOpportunity::create([
            'name' => $request->name,
            'vacancies' => $request->vacancies,
        ]);
    }
    public function edit(EmploymentOpportunity $employmentOpportunity)
    {
        return $employmentOpportunity->find($employmentOpportunity->id);
    }

    public function update(EmploymentOpportunityRequest $request, EmploymentOpportunity $employmentOpportunity)
    {
        $employmentOpportunity->update($request->validated());

        return response()->json(['message' => 'Updateed successfully']);
    }

    public function destroy(EmploymentOpportunity $employmentOpportunity)
    {
        $employmentOpportunity->delete();
    }
}
