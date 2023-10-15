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

    public function edit(EmploymentOpportunity $employment_opportunities)
    {
        $employmentOpportunity = EmploymentOpportunity::where('id', $employment_opportunities->id)->first();

        return response()->json($employmentOpportunity);
    }

    public function update(EmploymentOpportunityRequest $request, EmploymentOpportunity $employment_opportunities)
    {
        $employment_opportunities->update([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        return response()->json(['message' => 'Updateed Category successfully']);
    }

    public function destroy(EmploymentOpportunity $employment_opportunities)
    {
        $employment_opportunities->delete();
        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
