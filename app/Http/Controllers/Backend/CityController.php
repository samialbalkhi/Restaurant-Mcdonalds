<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\CityService;
use App\Http\Requests\Backend\CityRequest;

class CityController extends Controller
{
    public function __construct(private CityService $cityService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->cityService->index());
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
    public function store(CityRequest $request)
    {
        return response()->json(
            $this->cityService->store($request),201);
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
    public function edit(City $city)
    {
        return response()->json(
            $this->cityService->edit($city));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {
        
        response()->json(
            $this->cityService->update($request, $city));
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        response()->json($this->cityService->destroy($city));

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            200,
        );
    }
}
