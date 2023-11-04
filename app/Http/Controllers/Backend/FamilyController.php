<?php

namespace App\Http\Controllers\Backend;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\FamilyService;
use App\Http\Requests\Backend\FamilyRequest;

class FamilyController extends Controller
{

    public function __construct(private FamilyService $FamilyService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->FamilyService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request)
    {
        
        return response()->json(
            $this->FamilyService->store($request), 201);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return response()->json(
            $this->FamilyService->edit($family));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyRequest $request, Family $family)
    {
        $this->FamilyService->update($request, $family);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $this->FamilyService->destroy($family);

        return response()->json(['message' => 'deleted successfully'], 200);
    }


}
