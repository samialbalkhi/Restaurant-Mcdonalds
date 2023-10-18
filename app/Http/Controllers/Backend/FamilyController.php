<?php

namespace App\Http\Controllers\Backend;

use App\Models\Family;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\FamilyService;
use App\Http\Requests\Backend\FamilyRequest;

class FamilyController extends Controller
{
    use ImageUploadTrait;

    private $FamilyService;
    public function __construct(FamilyService $FamilyService)
    {
        $this->FamilyService = $FamilyService;
    }
    public function index()
    {
        return response()->json(
           $this->FamilyService->index());
    }

    public function store(FamilyRequest $request)
    {
        $family= $this->FamilyService->store($request);
        return response()->json($family, 201);
    }

    public function edit(Family $family)
    {
        return response()->json(
           $this->FamilyService->edit($family));
    }

    public function update(FamilyRequest $request, Family $family)
    {
        $this->FamilyService->update($request, $family);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Family $family)
    {
        $this->FamilyService->destroy($family);

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
