<?php

namespace App\Http\Controllers\Backend;

use App\Models\MyCafe;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\MycafeService;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeController extends Controller
{
    use ImageUploadTrait;

    private $MycafeService ;
    public function __construct(MycafeService $MycafeService)
    {
        $this->MycafeService = $MycafeService;
    }
    public function index()
    {
        return response()->json(
            $this->MycafeService->index());
    }

    public function store(MycafeRequest $request)
    {
          $mycafe=  $this->MycafeService->store($request);

        return response()->json($mycafe, 201);
    }

    public function edit(MyCafe $mycafe)
    {
        return response()->json(
            $this->MycafeService->edit($mycafe));
    }

    public function update(MycafeRequest $request, MyCafe $mycafe)
    {
       $this->MycafeService->update($request, $mycafe);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(MyCafe $mycafe)
    {
        $this->MycafeService->destroy($mycafe);

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
