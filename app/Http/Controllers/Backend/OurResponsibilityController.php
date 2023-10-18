<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Models\Ourresponsibility;
use App\Http\Controllers\Controller;
use App\Service\Backend\OurResponsibilityService;
use App\Http\Requests\Backend\OurResponsibilityRequest;

class OurResponsibilityController extends Controller
{
    use ImageUploadTrait;
    private $OurResponsibilityService ;
    public function __construct(OurResponsibilityService $OurResponsibilityService)
    {
        $this->OurResponsibilityService = $OurResponsibilityService;
    }
    public function index()
    {
        return response()->json(
          $this->OurResponsibilityService->index());
    }

    public function store(OurResponsibilityRequest $request)
    {
        $ourResponsibility=$this->OurResponsibilityService->store($request);
        return response()->json($ourResponsibility, 201);
    }

    public function edit(Ourresponsibility $ourResponsibility)
    {
        return response()->json(
           $this->OurResponsibilityService->edit($ourResponsibility));
    }

    public function update(OurResponsibilityRequest $request, Ourresponsibility $ourResponsibility)
    {
       $this->OurResponsibilityService->update($request,$ourResponsibility);
        return response()->json([
            'message' => 'Updateed  successfully',
        ]);
    }

    public function destroy(Ourresponsibility $ourResponsibility)
    {
     
        $this->OurResponsibilityService->destroy($ourResponsibility);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
