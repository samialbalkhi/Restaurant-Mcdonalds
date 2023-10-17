<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;
use App\Models\EmploymentOpportunity;

class EmploymentOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json(
            EmploymentOpportunity::all());
    }

    public function store(EmploymentOpportunityRequest $request)
    {
        $employmentOpportunity = EmploymentOpportunity::create([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        return response()->json($employmentOpportunity, 201);
    }

    public function edit(EmploymentOpportunity $employmentOpportunities)
    {
        return response()->json(
            $employmentOpportunities->find($employmentOpportunities->id));
    }

    public function update(EmploymentOpportunityRequest $request, EmploymentOpportunity $employmentOpportunities)
    {
        $employmentOpportunities->update([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        return response()->json(['message' => 'Updateed Category successfully']);
    }

    public function destroy(EmploymentOpportunity $employmentOpportunities)
    {
        $employmentOpportunities->delete();

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
