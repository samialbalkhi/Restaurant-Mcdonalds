<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\EmploymentOpportunityRequest;

class EmploymentOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employmentOpportunity = EmploymentOpportunity::all();

        return response()->json($employmentOpportunity);
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
        $employmentOpportunity = EmploymentOpportunity::where('id', $employmentOpportunities->id)->first();

        return response()->json($employmentOpportunity);
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
