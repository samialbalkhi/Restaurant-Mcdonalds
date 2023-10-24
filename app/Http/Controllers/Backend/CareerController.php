<?php

namespace App\Http\Controllers\Backend;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\CareerService;
use App\Http\Requests\Backend\CareerRequest;

class CareerController extends Controller
{
    private $CareerService;
    public function __construct(CareerService $CareerService)
    {
        $this->CareerService = $CareerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->CareerService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CareerRequest $request)
    {
        return response()->json(
            $this->CareerService->store($request), 201);
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
    public function edit(Career $career)
    {
        return response()->json(
            $this->CareerService->edit($career));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareerRequest $request, Career $career)
    {
        $this->CareerService->update($request, $career);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $this->CareerService->destroy($career);
        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
