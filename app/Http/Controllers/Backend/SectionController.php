<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\SectionService;
use App\Http\Requests\Backend\SectionRequest;

class SectionController extends Controller
{
    public function __construct(private SectionService $SectionService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->SectionService->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        return response()->json($this->SectionService->store($request), 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return response()->json($this->SectionService->edit($section));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section)
    {
        $this->SectionService->update($request, $section);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $this->SectionService->destroy($section);
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
