<?php

namespace App\Http\Controllers\Backend;

use App\Models\Career;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\CareerService;
use App\Http\Requests\Backend\CareerRequest;

class CareerController extends Controller
{
    use ImageUploadTrait;
    private $CareerService ;
    public function __construct(CareerService $CareerService)
    {
        $this->CareerService = $CareerService;
    }
    public function index()
    {
        return response()->json(
           $this->CareerService->index());
    }

    public function store(CareerRequest $request)
    {
        $career=$this->CareerService->store($request);
        return response()->json($career, 201);
    }

    public function edit(Career $career)
    {
        return response()->json(
           $this->CareerService->edit($career));
    }

    public function update(CareerRequest $request, Career $career)
    {
        $this->CareerService->update($request, $career);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Career $career)
    {
        $this->CareerService->destroy($career);
        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
