<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\SectionService;
use App\Http\Requests\Backend\SectionRequest;

class SectionController extends Controller
{

    private $SectionService;
    public function __construct(SectionService $SectionService)
    {
        $this->SectionService = $SectionService;
    }
    public function index()
    {
        return response()->json(
            $this->SectionService->index());
    }

    public function store(SectionRequest $request)
    {
           $section = $this->SectionService->store($request);
        return response()->json($section,201);

    }

    public function edit(Section $section)
    {
        return response()->json(
            $this->SectionService->edit($section));
    }

    public function update(SectionRequest $request, Section $section)
    {
        
            $this->SectionService->update($request, $section);
        return response()->json(['message' => 'updated successfully']);

    }

    public function destroy(Section $section)
    {
        
            $this->SectionService->destroy($section);
        return response()->json(['message' => 'Deleted successfully'], 202);

    }
}
