<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Ourresponsibility;
use App\Http\Controllers\Controller;
use App\Service\Backend\ourResponsibilityService;
use App\Http\Requests\Backend\OurResponsibilityRequest;

class ourResponsibilityController extends Controller
{
    public function __construct(private ourResponsibilityService $ourResponsibilityService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->ourResponsibilityService->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurResponsibilityRequest $request)
    {
        // $ourResponsibility = ;
        return response()->json($this->ourResponsibilityService->store($request), 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ourresponsibility $ourResponsibility)
    {
        return response()->json($this->ourResponsibilityService->edit($ourResponsibility));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurResponsibilityRequest $request, Ourresponsibility $ourResponsibility)
    {
        $this->ourResponsibilityService->update($request, $ourResponsibility);
        return response()->json([
            'message' => 'Updateed  successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourresponsibility $ourResponsibility)
    {
        $this->ourResponsibilityService->destroy($ourResponsibility);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            200,
        );
    }
}
