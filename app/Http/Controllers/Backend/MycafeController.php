<?php

namespace App\Http\Controllers\Backend;

use App\Models\MyCafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\MycafeService;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeController extends Controller
{
    public function __construct(private MycafeService $MycafeService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->MycafeService->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MycafeRequest $request)
    {
        return response()->json($this->MycafeService->store($request), 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyCafe $mycafe)
    {
        return response()->json($this->MycafeService->edit($mycafe));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MycafeRequest $request, MyCafe $mycafe)
    {
        $this->MycafeService->update($request, $mycafe);

        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyCafe $mycafe)
    {
        $this->MycafeService->destroy($mycafe);

        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
